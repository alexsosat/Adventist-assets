function deletePost($id) {
    if (confirm('Quiere borrar este usuario?')) {
        $.post('/publications/delete/'.$id, {
            '_token': '{{ @csrf_token() }}',
            'method': 'DELETE'
        }, function (data) {
            if (data.Error === 0) {
                alert('Usuario Borrado')
            } else {
                alert('Error al eliminar')
            }
        })
    };
}