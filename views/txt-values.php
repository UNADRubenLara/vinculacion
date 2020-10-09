<?php
   define('TXTAppName', 'Vinculacion');
   if (!isset($_SESSION['lang'])) {
      $_SESSION['lang'] = 'es';
   }
   if ($_SESSION['lang'] == 'es') {
      //General
      define('TXTenter', 'Entrar');
      define('TXTId', 'Id');
      define('TXThello', 'Hola ');
      define('TXTBtndelete', 'Borrar');
      define('TXTBtnUpdate', 'Actualizar');
      define('TXTBtnAdd', 'Agregar');
      define('TXTBtnEdit', 'Editar');
      define('TXTBtnNew', 'Nuevo');
      define('TXTWait', 'Espere, cargando los datos.');
      define('TXTduplicated', 'Los datos ya existen.');
      define('TXTError', 'Error: ');
      define('TXTSameId', 'Error mismo cliente ');
      define('TXTReturn', 'Regresar');


//footer
      define('TXTFooter', ' - 2020');

//Login
      define('TXTLoginError', 'por favor verifique sus credenciales');
      define('TXTLoginAdvice', 'Entrar al Sistema');
      define('TXTusername', 'Nombre de usuario');
      define('TXTplaceholderUser', 'Usuario');
      define('TXTplaceholderpass', 'Contraseña');

//Menu
      define('TXTmenuinit', 'Inicio');
      define('TXTmenuusers', 'Usuarios');
      define('TXTmenuproduct', 'Productos');
      define('TXTmenuOut', 'Salir');
      define('TXTmenuUserControl', 'Gestión de Usuarios');
      define('TXTmenuAddUser', 'Agregar Usuario');
      define('TXTmenuUpdateUser', 'Editar Usuario');
      define('TXTStatus', 'Cambiar el status del Usuario');
      define('TXTStatusUpdate', 'Actualizado');
      define('TXTmenufind', 'Buscar');
      define('TXTmenustats', 'Estadísticas');
      define('TXTmenuTools', 'Útilerias');
      define('TXTmenuToolsAdmin', 'ToolsAdmin');
      define('TXTmenuToolsUsers', 'ToolsUsers');
      define('TXTActions', 'Acciones');
      define('TXTView', 'Ver');
      define('TXTMsgToEval', 'Vinculaciones Pendientes');
      define('TXTSalute', 'Hola');


//errors
      define('TXTError401', 'Error 401 Prohibido');
      define('TXTError404', 'Error 404: URL no Existe');
      define('TXTnousers', 'No hay usuarios en la BD');
      define('TXTnoproducts', 'No hay productos en la BD');
      define('TxTError', 'Error de');
      define('TXTErrorOutRange', 'Valor Fuera de rango');


//Vista usuarios
      define('TXTUserName', 'Usuario');
      define('TXTUserFullName', 'Nombre completo');
      define('TXTUserFullNameplacehoder', 'Nombre o denominación');
      define('TXTUserRol', 'Rol');
      define('TXTUserBtnSuspend', 'Suspender');
      define('TXTUserBtnActivate', 'Activar');
      define('TXTUserStatusActive', 'Activo');
      define('TXTUserStatusInactive', 'Inactivo');
      define('TXTUserBranchText', 'Rama ');
      define('TXTUserMail', 'Correo');
      define('TXTUserZip', 'C.P.');
      define('TXTUserPhone', 'Teléfono');
      define('TXTUserAddress_street', 'Dirección ');
      define('TXTUserUbication', 'Colonia ');
      define('TXTUserCity', 'Ciudad ');
      define('TXTUserState', 'Estado');
      define('TXTUserLocation', 'Municipio');
      define('TXTUsername', 'Nombre de usuario');
      define('TXTUserPass', 'Contraseña');
      define('TXTUserNewPass', 'Nueva contraseña');
      define('TXTUserRFC', 'RFC');
      define('TXTUserAddress', 'Calle y número');
      define('TXTUserBranch', 'Rama');
      define('TXTUserFindHelp', 'Busqueda...');
      define('TXTUserSize', 'Tamaño');
      define('TXTUserBig', 'GRANDE');
      define('TXTUserMedium', 'MEDIANA');
      define('TXTUserSmall', 'MICRO');
   
   
      // Vista Productos
      define('TXTProductDetail', 'Descripción');
      define('TXTAddProduct', 'Agregar Producto');
      define('TXTUpdateProduct', 'Editar Producto');
      define('TXTProductDescription', 'Describir Producto');
      define('TXTImage', 'Imágen');
      define('TXTDeleteProduct', '¿Desea borrar este Producto?');
      define('TXTAddImage', 'Agregar imagen');
      
      //Vinculacion
      define('TXTlink', '¿Desea la información de este producto?');
      define('TXTBtnLink', 'Vincular');
      define('TXTEvaluatePending', 'Pendiente de Evaluar');
      define('TXTUserData', 'Datos del Proveedor ');
      define('TXTNotSuccessful', 'No se logro el trato');
      define('TXTSuccessful', 'Se logro el trato una vez');
      define('TXTSuccessfulandcontract', 'Se hizo contrato temporal');
      define('TXTSuccessfulandprovider', 'Se hizo contrato como cliente');
      define('TXTEvaluate', 'Evaluar');
      define('TXTFindProduct', 'Buscar descripción del producto, mínimo 4 caracteres');
      
      
      //Estadisticas
      define('TXTAccess', 'Accesos');
      define('TXTSelectDate', 'Seleccionar las fechas');
      define('TXTLastMonth', 'Último mes o ');
      define('TXTNoData', 'No Hay Datos ');
      define('TXTProductUsers', 'Productos por usuario');
      define('TXTMessages', 'Vinculaciones x usuario');
      define('TXTMessagesStats', 'Vinculaciones Logradas');
      
      
      //herramientas
      
      define('TXTloadZipTable', 'Cargar tabla de códigos Postales');
      define('TXTpasschange', 'Cambiar Password del Administrador');
      define('TXTOldPass', 'contraseña  Anterior');
      define('TXTNewPass', 'contraseña Nueva');
      define('TXTverifyPass', 'Verificar Nuevo Password');
      define('TXTNotMatch', 'No Coinciden');
      define('TXTBackup', 'Respaldar BD');
      define('TXTBackupmailbody', 'Respaldo de la base de datos');
      define('TXTMessageNotSend', 'El mensaje no puede ser enviado');
      define('TXTDownloadfile', 'Descargar archivo');
      define('TXTBackupok', 'Respaldo hecho');
      define('TXTSelectfile', 'Seleccionar archivo');
      
   } else {
      //General
      
      define('TXTenter', 'Enter');
      define('TXTId', 'Id');
      define('TXThello', 'Hello ');
      define('TXTBtndelete', 'Delete');
      define('TXTBtnUpdate', 'Update');
      define('TXTBtnAdd', 'Add');
      define('TXTBtnEdit', 'Edit');
      define('TXTBtnNew', 'New');
      define('TXTWait', 'Please wait, loading data.');
      define('TXTduplicated', 'The data already exists.');
      define('TXTError', 'Error:');
      define('TXTSameId', 'Same client error');
      define('TXTReturn', 'Return');


// footer
      define('TXTFooter', '- 2020');

//Login
      define('TXTLoginError', 'please verify your credentials');
      define('TXTLoginAdvice', 'Login to System');
      define('TXTusername', 'Username');
      define('TXTplaceholderUser', 'User');
      define('TXTplaceholderpass', 'Password');

//Menu
      define('TXTmenuinit', 'Home');
      define('TXTmenuusers', 'Users');
      define('TXTmenuproduct', 'Products');
      define('TXTmenuOut', 'Exit');
      define('TXTmenuUserControl', 'User Mamagement');
      define('TXTmenuAddUser', 'Add User');
      define('TXTmenuUpdateUser', 'Edit User');
      define('TXTStatus', 'Change User status');
      define('TXTStatusUpdate', 'Updated');
      define('TXTmenufind', 'Search');
      define('TXTmenustats', 'Statistics');
      define('TXTmenuTools', 'Utilities');
      define('TXTmenuToolsAdmin', 'ToolsAdmin');
      define('TXTmenuToolsUsers', 'ToolsUsers');
      define('TXTActions', 'Actions');
      define('TXTView', 'View');
      define('TXTMsgToEval', 'Pending Bindings');
      define('TXTSalute', 'Hello');


// errors
      define('TXTError401', 'Error 401 Forbidden');
      define('TXTError404', 'Error 404: URL does not exist');
      define('TXTnousers', 'There are no users in the DB');
      define('TXTnoproducts', 'There are no products in the DB');
      define('TxTError', 'Error of');
      define('TXTErrorOutRange', 'Value Out of Range');


// Users view
      define('TXTUserName', 'User');
      define('TXTUserFullName', 'Full Name');
      define('TXTUserFullNameplacehoder', 'Name or denomination');
      define('TXTUserRol', 'Role');
      define('TXTUserBtnSuspend', 'Suspend');
      define('TXTUserBtnActivate', 'Activate');
      define('TXTUserStatusActive', 'Active');
      define('TXTUserStatusInactive', 'Inactive');
      define('TXTUserBranchText', 'Branch');
      define('TXTUserMail', 'Mail');
      define('TXTUserZip', 'C.P.');
      define('TXTUserPhone', 'Phone');
      define('TXTUserAddress_street', 'Address');
      define('TXTUserUbication', 'Colony');
      define('TXTUserCity', 'City');
      define('TXTUserState', 'State');
      define('TXTUserLocation', 'Municipality');
      define('TXTUsername', 'Username');
      define('TXTUserPass', 'Password');
      define('TXTUserNewPass', 'New Password');
      define('TXTUserRFC', 'RFC');
      define('TXTUserAddress', 'Street and number');
      define('TXTUserBranch', 'Branch');
      define('TXTUserFindHelp', 'Search...');
      define('TXTUserSize', 'Size');
      define('TXTUserBig', 'BIG');
      define('TXTUserMedium', 'MEDIUM');
      define('TXTUserSmall', 'SMALL');
      
      
      // Products View
      define('TXTProductDetail', 'Description');
      define('TXTAddProduct', 'Add Product');
      define('TXTUpdateProduct', 'Edit Product');
      define('TXTProductDescription', 'Describe Product');
      define('TXTImage', 'Image');
      define('TXTDeleteProduct', 'Do you want to delete this Product?');
      define('TXTAddImage', 'Add Image');
      
      // Linkage
      define('TXTlink', 'Do you want the information of this product?');
      define('TXTBtnLink', 'Link');
      define('TXTEvaluatePending', 'Pending Evaluate');
      define('TXTUserData', 'Provider Data');
      define('TXTNotSuccessful', 'Deal failed');
      define('TXTSuccessful', 'The deal was successful once');
      define('TXTSuccessfulandcontract', 'Temporary contract was made');
      define('TXTSuccessfulandprovider', 'Contract as customer was made');
      define('TXTEvaluate', 'Evaluate');
      define('TXTFindProduct', 'Search product description minimum 4 characters');
      
      
      // Statistics
      define('TXTAccess', 'Accesses');
      define('TXTSelectDate', 'Select dates');
      define('TXTLastMonth', 'Last month or');
      define('TXTNoData', 'No Data');
      define('TXTProductUsers', 'Products per user');
      define('TXTMessages', 'Bindings x user');
      define('TXTMessagesStats', 'Bindings Successful');
      
      
      // tools
      
      define('TXTloadZipTable', 'Load Postal Code Table');
      define('TXTpasschange', 'Change Administrator Password');
      define('TXTOldPass', 'Previous Password');
      define('TXTNewPass', 'New Password');
      define('TXTverifyPass', 'Verify New Password');
      define('TXTNotMatch', 'Mismatch');
      define('TXTBackup', 'Backup DB');
      define('TXTBackupmailbody', 'Database backup');
      define('TXTMessageNotSend', 'The message cannot be sent');
      define('TXTDownloadfile', 'Download file');
      define('TXTBackupok', 'Backup done');
      define('TXTSelectfile', 'Select file');
   }
  