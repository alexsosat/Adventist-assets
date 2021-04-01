function deletePost($id) {
    confirm('Quiere borrar este usuario?');
    /*if (confirm('Quiere borrar este usuario?')) {
        $.post('/users/delete/'.$User - > id, {
            '_token': '{{ @csrf_token() }}',
            'method': 'DELETE'
        }, function (data) {
            if (data.Error === 0) {
                alert('Usuario Borrado')
            } else {
                alert('Error al eliminar')
            }
        })
    };*/
}