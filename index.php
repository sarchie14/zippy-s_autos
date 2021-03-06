<?php
require('./model/database.php');
require('./model/vehicle_db.php');
require('./model/types_db.php');
require('./model/classes_db.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_vehicles';
    }
}

if ($action == 'list_vehicles') {
   /* $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    $items = get_items_by_category($category_id); */
    $vehicle_id = filter_input(INPUT_GET, 'vehicleID', 
    FILTER_VALIDATE_INT);
    $vehicles = get_vehicles($vehicle_id);
    include('admin_vehicle_list.php');
}else if ($action == 'list_types') {
    $types = get_types();
    include('type_list.php');
} else if ($action == 'list_classes') {
    $classes = get_classes();
    include('class_list.php');
} else if ($action == 'delete_vehicle') {
    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE ||
            $vehicle_id == NULL || $vehicle_id == FALSE) {
        $error = "Missing or incorrect Item Num or category id.";
        include('./errors/error.php');
    } else { 
        delete_item($item_num);
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'delete_type') {
    $type_id = filter_input(INPUT_POST, 'typeID', 
            FILTER_VALIDATE_INT);
    
   /* if ($type_id == NULL || $type_id == FALSE) {
        $error = "Missing or incorrect type ID.";
        include('./errors/error.php');
    } else { */
        delete_type($type_id);
        header("Location: .?action=list_types");
    //}
} else if ($action == 'delete_class') {
    $class_id = filter_input(INPUT_POST, 'classID', 
            FILTER_VALIDATE_INT);
   
   /* if ($class_id == NULL || $class_id == FALSE) {
        $error = "Missing or incorrect Item Num or category id.";
        include('./errors/error.php');
    } else { */
        delete_class($class_id);
        header("Location: .?action=list_classes");
   // }
} else if ($action == 'show_add_form') {
    $types = get_types();
    include('add_vehicle_form.php');    
} else if ($action == 'add_vehicle') {
    $vehicle_id = filter_input(INPUT_POST, 'vehicleID', 
            FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_POST, 'typeID');
    $class_id = filter_input(INPUT_POST, 'classID');
    $year = filter_input(INPUT_POST, 'year');
    $make = filter_input(INPUT_POST, 'make');
    $model = filter_input(INPUT_POST, 'model');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

   /* if ($category_id == NULL || $category_id == FALSE || $item_num == NULL || 
            $title == NULL || $description == NULL) {
        $error = "Invalid item data. Check all fields and try again.";
        include('./errors/error.php');
    } else { */
        add_vehicle($type_id, $class_id, $year, $make, $model, $price);
        header("Location: .?vehicleID=$vehicle_id");
    //}
} else if ($action == 'add_type') {
    $type_id = filter_input(INPUT_POST, 'typeID', 
            FILTER_VALIDATE_INT);
    $type_name = filter_input(INPUT_POST, 'type_name');
    if ($type_name == NULL) {
        $error = "Invalid item data. Check all fields and try again.";
        include('./errors/error.php');
    } else { 
        add_type($type_id, $type_name);
        //
        //
        //
        header("Location: .?action=list_types");
         }
} else if ($action == 'add_class') {
    $class_id = filter_input(INPUT_POST, 'classID', 
            FILTER_VALIDATE_INT);
    $class_name = filter_input(INPUT_POST, 'class_name');
    if ($class_name == NULL) {
        $error = "Invalid item data. Check all fields and try again.";
        include('./errors/error.php');
    } else { 
        add_class($class_id, $class_name);
        header("Location: .?action=list_classes");
    }
}   



