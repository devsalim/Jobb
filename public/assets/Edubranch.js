$(document).ready(function(){

//let's create arrays
var BA = [
    {display: "Arts &  Humantities", value: "Arts &  Humantities" }, 
    {display: "Communication", value: "Communication" }, 
    {display: "Economics", value: "Economics" },
    {display: "English", value: "English" },
	{display: "Film", value: "Film" }, 
    {display: "Fine Arts", value: "Fine Arts" },
	{display: "Hindi", value: "Hindi" }, 
    {display: "History", value: "History" },
	{display: "Journalism", value: "Journalism" }, 
    {display: "Maths", value: "Maths" },
	{display: "Political Science", value: "Political Science" }, 
    {display: "Sociology", value: "Sociology" },
	{display: "Statistics", value: "Statistics" }, 
    {display: "Vocational Course", value: "Vocational Course" }];
    
var BArch = [
    {display: "Agriculture", value: "Agriculture" }];
    
var BCA = [
    {display: "Frozen yogurt", value: "frozen-yogurt" }, 
    {display: "Booza", value: "booza" }, 
    {display: "Frozen yogurt", value: "frozen-yogurt" },
    {display: "Ice milk", value: "ice-milk" }];
	
var BBA = [
    {display: "MBA in Accounting", value: "Accounting" }, 
    {display: "MBA in Business Administration", value: "Business Administration" }, 
    {display: "MBA in Business Analysis", value: "Business Analysis" },
    {display: "MBA in Communications", value: "Communications" },
	{display: "MBA in Criminal Justice", value: "Criminal Justice" }, 
    {display: "MBA in Entrepreneurship", value: "Entrepreneurship" },
	{display: "MBA in General Management", value: " General Management" }, 
    {display: "MBA in Health Care Management", value: "Health Care Management" },
	{display: "MBA in International Business", value: "International Business" }, 
    {display: "MBA in Management Information Systems", value: "Management Information Systems" },
	{display: "MBA in Pharma", value: "Pharma" }, 
    {display: "MBA in Real Estate", value: "Real Estate" },
	{display: "MBA Salary", value: "Salary" }, 
    {display: "MBA in Organizational behavior", value: "Organizational behavior" }];
	
	
var btech = [
    {display: "Agriculture", value: "Agriculture" }, 
	{display: "Aronotical", value: "Aronotical" },
	{display: "Automobile", value: "Automobile" },
	{display: "Bio-Chemistry", value: "Bio-Chemistry" },
	{display: "Biomedical", value: "Biomedical" },
	{display: "Ceramics", value: "Ceramics" },
	{display: "Chemical", value: "Chemical" },
	{display: "Civil", value: "Civil" },
	{display: "Computer Science", value: "Computer Science" },
    {display: "Electronics/Telecommunication", value: "Electronics/Telecommunication" }, 
    {display: "Mechanical Engineer", value: "Mechanical Engineer" }];
	
//If parent option is changed
$("#parent_selection").change(function() {
        var parent = $(this).val(); //get option value from parent 
        
        switch(parent){ //using switch compare selected option and populate child
              case 'BA':
                list(BA);
                break;
              case 'BArch':
                list(BArch);
                break;              
              case 'BCA':
                list(BCA);
                break;
			  case 'BBA':
                list(BBA);
                break;
			  case 'btech':
                list(btech);
                break;				
            default: //default child option is blank
                $("#child_selection").html('');  
                break;
           }
});

//function to populate child select box
function list(array_list)
{
    $("#child_selection").html(""); //reset child options
    $(array_list).each(function (i) { //populate child options 
        $("#child_selection").append("<option value=\""+array_list[i].value+"\">"+array_list[i].display+"</option>");
    });
}

});