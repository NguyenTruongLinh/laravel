// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    "language": {
      "lengthMenu": "Hiển thị _MENU_ dòng mỗi trang",
      "zeroRecords": "Không tìm thấy!",
      "info": "",
      "infoEmpty": "Không có bản ghi nào",
      "infoFiltered": "(filtered from _MAX_ total records)",
      "search": "Tìm kiếm",
      "paginate": {
        "first":      "First",
        "last":       "Last",
        "next":       "<i class='menu-icon mdi mdi-chevron-right'></i>",
        "previous":   "<i class='menu-icon mdi mdi-chevron-left'></i>"
      }
    }
  });
});
