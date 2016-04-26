/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




// birthday picker function for solicitudRegistro
 $(function () {

        for (i = new Date().getFullYear() ; i > 1900; i--) {
            $('#years').append($('<option />').val(i).html(i));
        }

        for (i = 1; i < 13; i++) {
            $('#months').append($('<option />').val(i).html(i));
        }
        updateNumberOfDays();

        $('#years, #months').change(function () {

            updateNumberOfDays();

        });

    });
    

    function updateNumberOfDays() {
        $('#days').html('');
        month = $('#months').val();
        year = $('#years').val();
        days = daysInMonth(month, year);

        for (i = 1; i < days + 1 ; i++) {
            $('#days').append($('<option />').val(i).html(i));
        }

    }

    function daysInMonth(month, year) {
        return new Date(year, month, 0).getDate();
    }

// search and add team for solicitudRegistro
$(document).ready(function () {
    //Hide clear btn on page load
    $('#clear').hide();
    //Add text input to list on button press
    $('#add').click(function () {
        //var toAdd gets the value of the input field
        var toAdd = $("input[name=checkListItem]").val();
        //Append list item in its own div with a class of item into the list div
        //It also changes the cursor on hover of the appended item 
        $('.list').append('<div class="item">' + toAdd + '</div>');
        //fade in clear button when the add button is clicked
        $('#clear').fadeIn('fast');
        //Clear input field when add button is pressed
        $('input').val('');
    });
    //Checks off items as they are pressed
    $(document).on('click', '.item', function () {
        //Chamge list item to red
        $(this).css("color", "#cc0000");
        //Change cursor for checked item
        $(this).css("cursor", "default");
        //Strike through clicked item while giving it a class of done so it will be affected by the clear
        $(this).wrapInner('<strike class="done"></strike>');
        //Add the X glyphicon
        $(this).append(" " + '<span class="glyphicon glyphicon-remove done" aria-hidden="true"></span>');
        //Stops checked off items from being clicked again
        $(this).prop('disabled', true);
    });
    //Removes list items with the class done
    $('#clear').click(function () {
        $('.done').remove('.done');
    });
});

//Search atlet
$(function () {
    $('#input-search').on('keyup', function () {
        var rex = new RegExp($(this).val(), 'i');
        $('.searchable-container .items').hide();
        $('.searchable-container .items').filter(function () {
            return rex.test($(this).text());
        }).show();
    });
});


//lista paises 

var country_list = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua &amp; Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas"
		,"Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia &amp; Herzegovina","Botswana","Brazil","British Virgin Islands"
		,"Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Cape Verde","Cayman Islands","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica"
		,"Cote D Ivoire","Croatia","Cruise Ship","Cuba","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea"
		,"Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana"
		,"Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India"
		,"Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kuwait","Kyrgyz Republic","Laos","Latvia"
		,"Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Mauritania"
		,"Mauritius","Mexico","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Namibia","Nepal","Netherlands","Netherlands Antilles","New Caledonia"
		,"New Zealand","Nicaragua","Niger","Nigeria","Norway","Oman","Pakistan","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal"
		,"Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre &amp; Miquelon","Samoa","San Marino","Satellite","Saudi Arabia","Senegal","Serbia","Seychelles"
		,"Sierra Leone","Singapore","Slovakia","Slovenia","South Africa","South Korea","Spain","Sri Lanka","St Kitts &amp; Nevis","St Lucia","St Vincent","St. Lucia","Sudan"
		,"Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad &amp; Tobago","Tunisia"
		,"Turkey","Turkmenistan","Turks &amp; Caicos","Uganda","Ukraine","United Arab Emirates","United Kingdom","Uruguay","Uzbekistan","Venezuela","Vietnam","Virgin Islands (US)"
		,"Yemen","Zambia","Zimbabwe"];

		
$(document).ready(function () { 
// get the distric select element via its known id 
var countrySelect = document.getElementById("countries"); 

var newOption; 
// create new options 
for (var i=0; i<country_list.length; i++) { 
newOption = document.createElement("option"); 
newOption.value = country_list[i];  // assumes option string and value are the same 
newOption.text=country_list[i]; 
// add the new option 
try { 
countrySelect.add(newOption);  // this will fail in DOM browsers but is needed for IE 
} 
catch (e) { 
countrySelect.appendChild(newOption); 
} 
} 
});		
		




//lista cantones

var CantonLists = new Array(4) 
CantonLists["0"] = ["Cantón"]; 
CantonLists["San Jose"] = ["San José", "Acosta", "Alajuelita", "Aserrí", "Curritadab", "Desamparados", "Dota", "Escazú", "Goicoechea", "León Cortés", "Montes de oca", "Mora", "Pérez Zeledón", "Puriscal", "Santa Ana", "Tarrazú", "Tibás", "Turrubares", "Vázquez de Coronado"]; 
CantonLists["Cartago"] = ["Cartago", "Alvarado", "El guarco", "Jiménez", "La unión", "Oreamuno", "Paraíso", "Turrialba"]; 
CantonLists["Alajuela"] = ["Alajuela", "Atenas", "Grecia", "Guatuso", "Los  chiles", "Naranjo", "Orotina", "Palmares", "Poás", "San Carlos", "San Mateo", "San Ramón", "Upala", "Valverde Vega", "Zarcero"]; 
CantonLists["Heredia"] = ["Heredia", "Belén", "Flores", "San Isidro", "San Pablo", "San Rafael", "Santa Bárbara", "Santo Domingo", "Sarapiquí"]; 
CantonLists["Limon"]= ["Limón", "Guácimo", "Matina", "Pococí", "Siquirres", "Talamanca"]; 
CantonLists["Guanacaste"]= ["Liberia", "Abangares", "Bagaces", "Cañas", "Carrillo", "Hojancha", "La Cruz", "Nandayure", "Nicoya", "Santa Cruz", "Tilarán"]; 
CantonLists["Puntarenas"]= ["Puntarenas", "France", "Aguirre", "Buenos Aires", "Corredores", "Coto Brus", "Esparza", "Garabito", "Golfito", "Montes de Oro", "Osa", "Parrita"]; 


function CantonChange(selectObj) { 
// get the index of the selected option 
var idx = selectObj.selectedIndex; 
// get the value of the selected option 
var which = selectObj.options[idx].value; 
// use the selected option value to retrieve the list of items from the districLists array 
cList = CantonLists[which]; 
// get the distric select element via its known id 
var cSelect = document.getElementById("Canton"); 
// remove the current options from the distric select 
var len=cSelect.options.length;
while (cSelect.options.length > 0) {  
cSelect.remove(0); 
} 
var newOption; 
// create new options 
for (var i=0; i<cList.length; i++) { 
newOption = document.createElement("option"); 
newOption.value = cList[i];  // assumes option string and value are the same 
newOption.text=cList[i]; 
// add the new option 
try { 
cSelect.add(newOption);  // this will fail in DOM browsers but is needed for IE 
} 
catch (e) { 
cSelect.appendChild(newOption); 
} 
} 
} 


//Codigo para las tab en miPerfil

jQuery(document).ready(function() {
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });
});