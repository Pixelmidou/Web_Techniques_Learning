<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX : PHP</title>
</head>
<body>
    <h1>Get the list of the employees by department</h1>
    <div>
        <label for="dep">Departments : </label>
        <select id="choice">
            <option value="0">Select a department</option>
            <?php 
            $con = new mysqli("localhost","root","","dvmais");
            $query = $con -> prepare("SELECT codeser,libelle FROM service");
            $query -> execute();
            $query = $query -> get_result();
            while ($row = $query -> fetch_array()) {
                echo "<option value='$row[0]'>$row[1]</option>";
            }
            ?>
        </select>
    </div>
    <div id="aff"></div>
    <script>
        document.getElementById("choice").addEventListener("change", getemployees)
        function getemployees() {
            sel = document.getElementById("choice")
            choice = sel.options[sel.selectedIndex].value
            xhr = new XMLHttpRequest()
            xhr.open("POST", "ajax6_data.php", true)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            xhr.onload = function() {
                if (this.status == 200) {
                    if (this.responseText == "0") {
                        document.getElementById("aff").innerHTML = ""
                    } else if (this.responseText == "nope") {
                        document.getElementById("aff").innerHTML = "No employees in this department"
                    } else {
                        emp = JSON.parse(this.responseText)
                        output = ""
                        for (i = 0; i < emp.length; i++) {
                            output += 
                            '<ul>' + 
                                '<li> Id : ' + emp[i][0] + '</li>' + 
                                '<li> Name : ' + emp[i][1] + '</li>' + 
                                '<li> Rank : ' + emp[i][2] + '</li>' + 
                                '<li> Social Status : ' + emp[i][3] + '</li>' +
                                '<li> Diploma : ' + emp[i][4] + '</li>' +
                                '<li> Date Of Hire : ' + emp[i][5] + '</li>' +
                            '</ul>'
                        }
                        document.getElementById("aff").innerHTML = output
                    }
                }
            }
            xhr.send("choice=" + choice)
        }
    </script>
</body>
</html>