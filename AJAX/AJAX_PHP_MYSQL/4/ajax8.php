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
    <input type="button" value="<<" id="p" onclick="previous()">
    <input type="button" value=">>" id="a" onclick="next()">
    <script>
        var i = 0
        var stu = []
        loadstudent()
        document.getElementById("p").addEventListener("click", loadstudent)
        document.getElementById("a").addEventListener("click", loadstudent)
        function loadstudent() {
            xhr = new XMLHttpRequest()
            xhr.open("POST", "ajax8_data.php", true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            xhr.onload = function() {
                if (this.status == 200) {
                    stu = JSON.parse(this.responseText)
                    output = ""
                    for (j = 0; j < stu.length - 1; j++) {
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
            xhr.send("i=" + i)
        }
        function next() {
            if (i < stu[1] - 1) {
                i++
            }
        }
        function previous() {
            if (i > 0) {
                i--
            }
        }
    </script>
</body>
</html>