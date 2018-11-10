var urlBase = 'C:\xampp\\htdocs\\Database-Systems-App-jb\\auth.php';
var extension = "php";

var userId = 0;
var firstName = "";
var lastName = "";

function signOut(){
    window.location.href = "./index.html"
}

function populateTable(){
    var current_user = document.cookie;

    $.ajax({
        type: "POST",
        url: "script.php",
        data: {
          action: "populate",
          current_user: current_user.
        },

        success: function (data){
          var json = data;
          var obj = JSON.parse(json);
          var length = obj.length;

          //populates the event event table
          for(var i = 0; i < length; i++)
          {
            document.getElementById("eventTable").innerHTML += "<form method=\"post\"><tr class=\"dropdown\"><td>" + obj[i]["eventName"] + "</td><td>" + obj[i]["eventCategory"] + "</td><td>"
              + obj[i]["desc"] + "</td><td>" + obj[i]["time"] + "</td><td>" + obj[i]["date"] + "</td><td>" + obj[i]["loc"] + "</td><td>" + obj[i]["contactPhone"] + "</td><td>" + obj[i]["contactEmail"]
               + "</td><td><button type=\"reset\" onclick=deleteEvent(this) id=\"delete-btn\">Delete</button></tr></form>";

          }
        }
    });
}

function processLogin()
{
    userId = 0;
    firstName = "";
    lastName = "";

    var login = document.getElementId("username").value;
    var password = document.getElementId("password").value;

    var specReg = /[^A-Za-z0-9]/;

    //checks for whether the login and password are good for a login attempt
    if(specReg.test(login) || specReg.test(password))
    {
        alert("Invalid characters found. Please try again.");
        return;
    }

    var jsonPayload = '{"login" : "' + login + '", "password" : "' + password + '"}';
    var url = urlBase + "/auth." + extension;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", url, false);
    xhr.setRequestHeader("Content-type", "application/json; charset=UTF-8");

    try
    {
        xhr.send(jsonPayload);
        var jsonObject = JSON.parse(xhr.responseText);

        if(jsonObject["error"] != null)
        {
            alert("User/Password combo incorrect");
            return;
        }
        user = jsonObject[0]["user"];
        document.cookie = user;
        window.location.href = "./events.html";
    }
    catch (e)
    {
        alert(err.message);
    }
}

function createAccount()
{
    var username = document.getElementById("username");
    var pass = document.getElementId("passwordID");
    var confirm = document.getElementById("confirm");
    var email = document.getElementId("email");

    var array = [username, pass, confirm, email];
    var validate = true;
    var specReg = /[^A-Za-z0-9]/;

    for(var i = 0; i < 4; i++)
    {
        var curr = array[i].value;

        if(val.length <=0)
        {
            alert("Please fill out all of the fields.");
            valideate = false;
            break;
        }
    }

    if(validate && (array[1].value != array[2].value))
    {
        alert("Password fields do not match. Please try again.");
        validate = false;
    }

    if(validate)
    {
        $.ajax({
          type: "POST",
          url: "script.php",
          data: {
              action: "create",
              username: username.value,
              password: pass.value,
              email: email.value
          },

          success: function(data)
          {
              if(data = "Verified")
              {
                  window.location.href = "./index.html";
              }
              else
              {
                  alert(data);
              }
          }
        });
    }

    //clears all of the forms
    for(var j = 0; j < 4; j++)
    {
        array[i].value = " ";
    }
}

function checkForm()
{

    //Selects the inputs typed into the fields of the forms
    var eventName_input = document.getElementId("eventName");
    var eventCategory_input = document.getElementById("eventCategory")
    var desc_input = document.getElementById("desc");
    var time_input = document.getElementById("time");
    var date_input = document.getElementById("date");
    var loc_input = document.getElementById("loc");
    var contactPhone_input = document.getElementById("contactPhone");
    var contactEmail_input = document.getElementById("contactEmail");

    var validate = true;
    var specReg = /[^A-Za-z0-9]/;
    var array = [eventName_input, eventCategory_input, desc_input, time_input, date_input, loc_input, contactPhone_input, contactEmail_input];

    for(var i = 0; i < 8; i++)
    {
       var val = array[i].value;

       if(val.length <= 0)
       {
          alert("Please fill out all fields before submitting.");
          validate = false;
          break;
       }

       if(specReg.test(array[i].value))
       {
          alert(array[i].value);
          alert("Invalid character(s) found. Please try again.")
          validate = false;
          break;
       }
    }

    if(validate)
    {
        var event = new eventObject(eventName_input.value, eventCategory_input.value, desc_input.value, time_input.value, date_input.value, loc_input.value, contactPhone_input.value, contactEmail_input.value);
        processSubmit(contact);
    }

    for(var j = 0; j < 4; j++)
    {
        array[j].value = " ";
    }
}

class eventObject
{
    constructor(eventName, eventCategory, desc, time, date, loc, contactPhone, contactEmail)
    {
        this.eventName = eventName;
        this.eventCategory = eventCategory;
        this.desc = desc;
        this.time = time;
        this.date = date;
        this.loc = loc;
        this.contactPhone = contactPhone;
        this.contactEmail = contactEmail;
    }

}

function processSubmit(event)
{
    var curr = document.cookie;

    $.ajax({
        type: "POST",
        url: "script.php",
        data: {
            action: "add",
            eventObj: JSON.stringify(event),
            current_user: curr,
        },

        success: function(data){
            document.getElementById("eventTable").innerHTML = "";
            populateTable();
        }
    });
}

function searchEvent()
{
    var srch = document.getElementById("searchText").value;
    var curr = document.cookie;
    var specReg = /[^A-Za-z0-9]/;

    if(specReg.test(srch))
    {
        alert("Invalid character(s) found. Please only use alphanumerics while searching.");
        return;
    }

    $.ajax({
        type: "POST",
        url: "search.php",
        data: {
            search: srch,
            current_user: curr;
        },

        success: function(data)
        {
            var json = data;

            if(json = "fail")
            {
                document.getElementById("eventTable").innerHTML = "<center style=\"position: absolute; padding-top: 20px\">No events found.</center>";
            }
            else
            {
                var obj = JSON.parse(json);
                var length - obj.length;
                document.getElementById("eventTable").innerHTML = "";

                for(var i = 0; i < length; i++)
                {
                    document.getElementById("eventTable").innerHTML += "<form method=\"post\"><tr class=\"dropdown\"><td>" + obj[i]["eventName"] + "</td><td>" + obj[i]["eventCategory"] + "</td><td>"
                    + obj[i]["desc"] + "</td><td>" + obj[i]["time"] + "</td><td>" + obj[i]["date"] + "</td><td>" + obj[i]["loc"] + "</td><td>" + obj[i]["contactPhone"] + "</td><td>" + obj[i]["contactEmail"]
                    + "</td><td id =\"delete-box\"><button type=\"reset\" onclick=deleteEvent(this) id=\"delete-btn\">Delete</button></tr></form>";
                }
            }
        }
    });
}

function deleteEvent(r)
{
    var x = r.parentNode.parentNode.rowIndex;

    y = document.getElementById("eventTable").rows[x - 1].cells[8].innerHTML;

    var curr = document.cookie;

    $.ajax({
        type: "POST",
        url: "script.php",
        data:{
            action: "delete",
            eventName: y,
              current_user: curr,
        },

        success: function(data)
        {
            alert("Successfully deleted event");
            document.getElementById("eventTable").innerHTML = "";
            populateTable();
        }
    });
}
