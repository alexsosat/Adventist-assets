function formatList($id) {
    switch ($id) {
        case 0:
            return "2D";
        case 1:
            return "3D";
        default:
            return "error";
    }
}