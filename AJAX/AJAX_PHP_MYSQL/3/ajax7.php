<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX : PHP</title>
</head>
<body>
    <h1>List of students</h1>
    <div id="aff"></div>
    <input type="button" value="Load More" id="lm" onclick="add()">
    <script>
        var i = 1
        loadstudents()
        document.getElementById("lm").addEventListener("click", loadstudents)
        function loadstudents() {
            xhr = new XMLHttpRequest()
            xhr.open("POST", "ajax7_data.php", true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            xhr.onload = function() {
                if (this.status == 200) {
                    stu = JSON.parse(this.responseText)
                    output = ""
                    for (j = 0; j < stu.length; j++) {
                        output += 
                        '<ul>' + 
                            '<li> Id : ' + stu[j][0] + '</li>' + 
                            '<li> Name : ' + stu[j][1] + '</li>' + 
                            '<li> Date Of Birth : ' + stu[j][2] + '</li>' + 
                        '</ul>'
                    }
                    document.getElementById("aff").innerHTML = output
                }
            }
            xhr.send("i="+i)
        }
        function add() {
            i += 2
        }
    </script>
</body>
</html>