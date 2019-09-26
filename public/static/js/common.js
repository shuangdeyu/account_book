// 提示弹窗
function show(type, msg) {
    $("#ShowMsg").html("<div class=\"row flex-spaces\">\n" +
        "        <input class=\"alert-state\" id=\"alert-5\" type=\"checkbox\">\n" +
        "        <div class=\"alert " + type + " dismissible\">\n" + msg +
        "            <label class=\"btn-close\" for=\"alert-5\">X</label>\n" +
        "        </div>\n" +
        "    </div>");
    $("#ShowMsg .flex-spaces").css("display", "black");
}


