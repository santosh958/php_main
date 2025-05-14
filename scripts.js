var selectedRow = null;
function makeFormVisible()
{
  $("#form").toggle();
}
function disappearForm()
{
  $("#form").hide();
}

function getFormData(){
  var formData = {};
  formData["name"] = document.getElementById("name").value;
  formData["email_id"] = document.getElementById("email_id").value;
  var splChars = /[._^%$#!~@,-]/;
  if (splChars.test( formData.name)) {
    if(confirm("Name cannot have special characters")){
      return null;}}
  return formData;
 }

 function onFormSubmit() {
  var formData = getFormData();
  selectedRow.cells[1].innerHTML = formData.name;
  selectedRow.cells[2].innerHTML = formData.email_id;
 }

 function onEdit(td) {
    selectedRow = td.parentElement.parentElement;
    document.getElementById("name").value = selectedRow.cells[1].innerHTML;
    document.getElementById("email_id").value = selectedRow.cells[2].innerHTML;
 }
 function onDelete(td) {
    if (confirm('Are you sure to delete this record ?')) {
        row = td.parentElement.parentElement;
        document.getElementById("student_table").deleteRow(row.rowIndex);
        document.getElementById("name").value = "";
        document.getElementById("email_id").value = "";
        selectedRow = null;
    }
}