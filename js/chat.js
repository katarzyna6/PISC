function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

$("#add-btn").click(function() {
    var val = "Vous:  " + $("#name").val();
    $("#list").append(
"<li>" + "<div id= 'chatlogs'><div id= 'you-logs'><div id= 'you-message'>" + val + "</div> </div> <div id= 'bot-logs'></div><div id= 'bot-message'>Admin: Bonjour, puis-je vous aider ? </div></div></div> </li>");
    var d = $("#chatbox");
    d.scrollTop(d.prop("scrollHeight"));
    $("#name")
      .val("")
      .focus();
  });
