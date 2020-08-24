function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

$("#add-btn").click(function() {
    var val = "You:  " + $("#name").val();
    $("#list").append(
"<li>" + "<div id= 'chatlogs'><div id= 'you-logs'><div id= 'you-message'>" + val + "</div> </div> <div id= 'bot-logs'><div id= 'bot-image'><img src = 'img/logo.png' style = 'width: 40px; height:36px ;'></div><div id= 'bot-message'>Bot: hi helllo </div></div></div> </li>");
    var d = $("#chatbox");
    d.scrollTop(d.prop("scrollHeight"));
    $("#name")
      .val("")
      .focus();
  });
