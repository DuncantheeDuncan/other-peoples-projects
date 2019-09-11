
var addButton= document.querySelector(".solve_salary")
var names = [];
//for(var i =0; i>names.length; i++){
//names[i];

//}

function solve_salarys(){
    var emp_name = document.getElementById("emp_name").value;
    var daily_rate = document.getElementById("daily_rate").value;
    var no_days_work = document.getElementById("no_days").value;

    gross_pay= parseFloat(daily_rate) * no_days_work;
    results = "Employee's Name : " + emp_name + ".";
    results2 ="Basic Salary  R" + gross_pay.toFixed(2)+".";



 names.push(emp_name);

localStorage.setItem("lastname", names);


    document.getElementById("emp_names").innerHTML = results;
    document.getElementById("example2").innerHTML = results2;
    document.getElementById("example3").innerHTML = localStorage.getItem("lastname");
}
addButton.addEventListener("click", solve_salarys)
