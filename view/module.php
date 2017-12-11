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
    $com->upvote_count = 3;
    $com->has_upvoted = false;
    $com->is_new = $comment->isNew();

    $arrayOfArrays[] = $com;
    unset($com);

}
var_dump($arrayOfArrays);
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

                  //  success(commentsArray);
                    var ar =<?php print $myJson ?>;
                    success(ar);
                   // console.log(ar);
                   // console.log(commentsArray)

                }, 500);
            },
            postComment: function(data, success, error) {
                setTimeout(function() {
                    success(saveComment(data));
                }, 500);
            },
            putComment: function(data, success, error) {
                setTimeout(function() {
                    success(saveComment(data));
                }, 500);
            },
            deleteComment: function(data, success, error) {
                setTimeout(function() {
                    success();
                }, 500);
            },
            upvoteComment: function(data, success, error) {
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