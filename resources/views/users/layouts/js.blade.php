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


</script>

