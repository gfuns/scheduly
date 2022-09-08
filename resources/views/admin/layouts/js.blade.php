  <!--==================================
=============== Js Plugin File ===========
===================================-->
<script src="{{asset('libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('libs/bootstrap/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('libs/list.js/dist/list.min.js')}}"></script>
<script src="{{asset('libs/sweetalert/dist/sweetalert2.min.js')}}"></script>
<script src="{{asset('js/iziToast.js')}}"></script>
<script src="{{asset('js/iziwrapper.js')}}"></script>
<!-- JS -->


<script>
// function filterRecords() {
//   var input, filter, table, tr, td, i, txtValue;
//   input = document.getElementById("user-search");
//   filter = input.value.toUpperCase();
//   table = document.getElementById("user-table");
//   tr = table.getElementsByTagName("tr");
//   for (i = 0; i < tr.length; i++) {
//     td = tr[i].getElementsByTagName("td")[1] || tr[i].getElementsByTagName("td")[2];
//     if (td) {
//       txtValue = td.textContent || td.innerText;
//       if (txtValue.toUpperCase().indexOf(filter) > -1) {
//         tr[i].style.display = "";
//       } else {
//         tr[i].style.display = "none";
//       }
//     }       
//   }
// }

const filterRecords = () => {
  const trs = document.querySelectorAll('#search-table tr:not(.header)')
  const filter = document.querySelector('#search-input').value
  const regex = new RegExp(filter, 'i')
  const isFoundInTds = td => regex.test(td.innerHTML)
  const isFound = childrenArr => childrenArr.some(isFoundInTds)
  const setTrStyleDisplay = ({ style, children }) => {
    style.display = isFound([
      ...children // <-- All columns
    ]) ? '' : 'none' 
  }
  
  trs.forEach(setTrStyleDisplay)
}

function toggleActive(elt){
  // Get the checkbox
  var checkBox = document.getElementById(elt.id);
  if (checkBox.checked == true){
    document.getElementById("activate"+elt.id).style.display="block";
    document.getElementById("deactivate"+elt.id).style.display="none";
  } else {
    document.getElementById("deactivate"+elt.id).style.display="block";
    document.getElementById("activate"+elt.id).style.display="none";
  }

    $.ajax({
      headers: {"X-CSRF-TOKEN": "{{ csrf_token() }}",},
      url:"{{ route('admin.activateCalendarDay') }}",
      method:"POST",
      data:{day:elt.id},
      success:function(response)
        {
          console.log(response);
          if(response.success) {
              success('Success', "Changes Saved")
          }else{
              error('Error', "Something Went Wrong")
          }
        }
      });
}

function updateStartTime(elt){
  $.ajax({
      headers: {"X-CSRF-TOKEN": "{{ csrf_token() }}",},
      url:"{{ route('admin.updateStartTime') }}",
      method:"POST",
      data:{
        day:elt.id,
        starttime:elt.value
      },
      success:function(response)
        {
          console.log(response);
          if(response.success) {
              success('Success', "Changes Saved")
          }else{
              error('Error', "Something Went Wrong")
          }
        }
      });
}

function updateStopTime(elt){
  $.ajax({
      headers: {"X-CSRF-TOKEN": "{{ csrf_token() }}",},
      url:"{{ route('admin.updateStopTime') }}",
      method:"POST",
      data:{
        day:elt.id,
        stoptime:elt.value
      },
      success:function(response)
        {
          console.log(response);
          if(response.success) {
              success('Success', "Changes Saved")
          }else{
              error('Error', "Something Went Wrong")
          }
        }
      });
}


/* When the user clicks on the button, 
      toggle between hiding and showing the dropdown content */
      function myFunction(id) {
        document.getElementById("myDropdown"+id).classList.toggle("show");
      }

      // Close the dropdown if the user clicks outside of it
      window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          var i;
          for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
            }
          }
        }
      }



      
$('#viewAdditionalInfo').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var additionalinfo = button.data('additionalinfo') // Extract info from data-* attributes
var modal = $(this)
document.getElementById("additionalinfo").innerHTML = additionalinfo;

})


</script>

