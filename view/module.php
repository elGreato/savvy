<?php
/**
 * Created by PhpStorm.
 * User: Ali-Surface
 * Date: 12/5/2017
 * Time: 10:48 AM
 *     <span class="commentBody">

<i class="glyphicon glyphicon-user"></i>
<?php echo $comment->getStudentname() ?>
<?php echo $comment->getComment() ?>
</span>
 */

require_once "headerLoggedIn.php";

?>
<head>
    <title> <?php echo $this->mod->getName(); ?> </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<h1 align="center"> <?php echo $this->mod->getName(); ?>    </h1>
<h4> <?php echo $this->mod->getDescription(); ?></h4>

<?php
$comArray = $this->comments;
global $com ;
$arrayOfArrays = array();
foreach ($comArray as $comment) {
    // to get rid of the warning
    if(!isset($com)) $com= new stdClass(); $com->success=false;
    $com->id = $comment->getId();
    $com->parent = $comment->getParent();
    $com->created = $comment->getCreated();
    $com->modified = null;
    $com->content = $comment->getComment();
    $com->pings = [];
    $com->creator = $comment->getStudentid();
    $com->fullname = $comment->getStudentname();
    $com->profile_picture_url = null;
    $com->created_by_admin = false;
    $com->created_by_current_user = $comment->getIsFromUser();
    $com->upvote_count = $comment->getVoteResult();
    //check if user has like this comment

    $com->has_upvoted = $comment->hasLiked();
    $com->is_new = $comment->isNew();

    $arrayOfArrays[] = $com;
    unset($com);

}

$myJson = json_encode($arrayOfArrays);
?>


<body><div id="comments-container"></div></body>

<?php require_once "footer.php"; ?>



<!-- Init jquery-comments -->
<script type="text/javascript">
    $(function() {
        var saveComment = function(data) {

            // Convert pings to human readable format
            $(data.pings).each(function(index, id) {
                var user = usersArray.filter(function(user){return user.id == id})[0];
                data.content = data.content.replace('@' + id, '@' + user.fullname);
            });

            return data;
        }
        $('#comments-container').comments({
            profilePictureURL: 'https://viima-app.s3.amazonaws.com/media/user_profiles/user-icon.png',
            currentUserId: 1,
            roundProfilePictures: false,
            textareaRows: 1,
            enableAttachments: true,
            enableHashtags: true,
            enablePinging: true,
            getUsers: function(success, error) {
                setTimeout(function() {
                    success(usersArray);
                }, 500);
            },
            getComments: function(success, error) {
                setTimeout(function() {

                    var ar =<?php print $myJson ?>;
                    success(ar);


                }, 500);
            },
            /*

A callback function that is used to create a new comment to the server. The first parameter of the callback
is commentJSON that contains the data of the new comment. The callback provides both success and error callbacks which should be
called based on the result from the server. The success callback takes the created comment as a parameter.
             */
            postComment: function(commentJSON, success, error) {
                    $.ajax({
                        type: 'POST',
                        url: 'saveComment',
                        data: commentJSON,
                       // dataType: 'json',
                     //   contentType: "application/json",

                        success: function(data,status,xhr) {
                            console.log(data)
                           // console.log("what about "+data[0].id )
                            var dataJ = data.substr(1,15)
                            var numb = dataJ.match(/\d/g);
                            var comment_id = numb.join("");

                            console.log("id is "+comment_id);
                            commentJSON.id =comment_id

                        //    success(data);
                        },
                        error: error
                    })

                    setTimeout(function() {
                        success(saveComment(commentJSON));

                    }, 500);

            },

            putComment: function(commentJSON, success, error) {
                $.ajax({
                    type: 'POST',
                    url: 'editComment',
                    data: commentJSON,


                    success: function(data) {
                        console.log(data)

                        var dataJ = data.substr(1,15)
                        var numb = dataJ.match(/\d/g);
                        var comment_id = numb.join("");

                        console.log("id is "+comment_id);
                        commentJSON.id =comment_id

                        //    success(data);
                    },
                    error: error
                })
                setTimeout(function() {
                    success(saveComment(commentJSON));
                }, 500);
            },

            deleteComment: function(data, success, error) {
                $.ajax({
                    type: 'GET',
                    url: 'deleteComment',
                    data: data,
                    success: function(){
                       alert("The comment has been Deleted")
                    }
                })
                setTimeout(function() {
                    success();
                }, 500);
            },
            upvoteComment: function(commentJSON, success, error) {
                $.ajax({
                    type: 'GET',
                    url: 'upvote',
                    data: commentJSON,
                    success: function(data){
                        console.log(data);
                        alert("The comment has been upvoted")
                    }
                })

                setTimeout(function() {
                    success(data);
                }, 500);
            },
            uploadAttachments: function(dataArray, success, error) {
                setTimeout(function() {
                    success(dataArray);
                }, 500);
            },
        });
    });
</script>
<!--Activate this later to suppress warnings and bullshit errors-->
<!--<script type="text/javascript">
    window.onerror = function(message, url, lineNumber) {

        return true; // prevents browser error messages
    };
</script>-->
