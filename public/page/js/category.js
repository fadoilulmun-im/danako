document.addEventListener('DOMContentLoaded', function() {
  let type = $(location).attr('hash').slice(1) ?? 'campaign';
  clickable(type);
  let table = $('#datatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('api.master.categories.index') }}?type=" + type,
    columns: [
      {data: 'DT_RowIndex', name: 'id', searchable: false},
      {data: 'name', name: 'name'},
      {data: 'action', name: 'action', orderable: false, searchable: false},
    ],
    order: [[0, 'desc']]
  });

  window.addEventListener('hashchange', function(){
    $('.clickable').removeClass('btn-primary').addClass('btn-outline-primary');

    type = $(location).attr('hash').slice(1);

    clickable(type)

    table.ajax.url( "{{ route('api.master.categories.index') }}?type=" + type ).load();
  });

  function clickable(type){
    $('.clickable').each(function(){
      if($(this).text().toLowerCase() == type){
        $(this).removeClass('btn-outline-primary').addClass('btn-primary');
      }
    });
  }

  $('.clickable.create').on('click', function(){
    type = ($(this).text().toLowerCase());
    $('.clickable.create.btn-primary').removeClass('btn-primary').addClass('btn-outline-primary');
    $(this).removeClass('btn-outline-primary').addClass('btn-primary');
  });

  $('#form-create').submit(function(e){
    $('#loading').click();
    e.preventDefault();
    $('#create-type').val(type);
    let data = $(this).serialize();

    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ route('api.master.categories.store') }}",
      type: "POST",
      data: data,
      success: function(response){
        if(response.meta.status == 'OK'){
          $('.btn-close').click();
          table.ajax.reload();
          $('#create-name').val('');
        }
      }
    }).always(function(){
      $('#close-loading').click();
    });
  });

  function edit(id){
    $('#loading').click();
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{ route('api.master.categories.show', '') }}/" + id,
      type: "GET",
      success: function(response){
        if(response.meta.status == 'OK'){
          $('#edit-id').val(response.data.id);
          $('#edit-name').val(response.data.name);
          $('#edit-type').val(type);
          $('#editModal').modal('show');
        }
      }
    }).always(function(){
      $('#close-loading').click();
    });
  }
});