<?php
session_start();
$title = "Strona główna zalogowany";
if (!isset($_SESSION['user_id'])) {
    
    header('Location: login.php');
    exit();
}


$user_name = $_SESSION['user_name'];

include("loggedin.html");
?>
<div>
    <h2>Witaj! <?php echo htmlspecialchars($user_name); ?>!</h2>
    <p>To jest zawartość strony głównej. Jesteś zalogowany!</p>
    <h3>Mamy swoją palarnię kawy</h3>
    <p> Lorem Ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development
        to fill empty spaces in a layout that do not yet have content.
        Lorem ipsum is typically a corrupted version of De finibus bonorum et malorum, a 1st-century BC text by the
        Roman statesman and philosopher Cicero, with words altered, added, and removed to make it nonsensical and
        improper Latin. The first two words themselves are a truncation of dolorem ipsum ("pain itself"). is a dummy
        or placeholder text commonly used in graphic design, publishing, and web development to fill empty spaces in
        a layout that do not yet have content.
        Lorem ipsum is typically a corrupted version of De finibus bonorum et malorum, a 1st-century BC text by the
        Roman statesman and philosopher Cicero, with words altered, added, and removed to make it nonsensical and
        improper Latin. The first two words themselves are a truncation of dolorem ipsum ("pain itself"). is a dummy
        or placeholder text commonly used in graphic design, publishing, and web development to fill empty spaces in
        a layout that do not yet have content.</p>
    <h3>Piękne wnętrza</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec pur us sem nec purus , nec purus.Lorem
        Ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development to
        fill empty spaces in a layout that do not yet have content.
        Lorem ipsum is typically a corrupted version of De finibus bonorum et malorum, a 1st-century BC text by the
        Roman statesman and philosopher Cicero, with words altered, added, and removed to make it nonsensical and
        improper Latin. The first two words themselves are a truncation of dolorem ipsum ("pain itself"). is a dummy
        or placeholder text commonly used in graphic design, publishing, and web development to fill empty spaces in
        a layout that do not yet have content.
        Lorem ipsum is typically a corrupted version of De finibus bonorum et malorum, a 1st-century BC text by the
        Roman statesman and philosopher Cicero, with words altered, added, and removed to make it nonsensical and
        improper Latin. The first two words themselves are a truncation of dolorem ipsum ("pain itself"). is a dummy
        or placeholder text commonly used in graphic design, publishing, and web development to fill empty spaces in
        a layout that do not yet have content. </p>

    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec pur us sem nec purus , nec purus.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec pur us sem nec purus , nec purus.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec pur us sem nec purus , nec purus.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec pur us sem nec purus , nec purus. </p>
</div>

<?php
include("footer.html");
?>
