if (localStorage.getItem("sidebar_state") == 'close') {
var body_tag = document.getElementsByTagName("body")[0];
body_tag.className += ' sidebar-collapse';
}