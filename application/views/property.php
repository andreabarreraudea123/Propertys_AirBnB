<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h2>LISTA DE PROPIEDADES</h2>
        </div>
        <div class="col">
        <button type="button" id="boton" class="btn btn-primary ">ADD PROPERTY</button>
        </div>
    </div>
</div>
<div class="container fondo-propiedades mt-3 mb-3">
<div class='row mt-3'>
    <?php
    foreach($properties as $property)
    {
        //se pinta registros obtenidos de la tabla 
        $template = "
        
        <div class = 'col-12 col-md-4'>  
            <div class='card mt-2' style='width: 22rem;'>
            
                <div class='card-body text-center'>
                    <h5 class = 'card-title'><strong>{$property->title}</strong></h5>
                    <img src='assets/image/casa1.jpg' class='card-img' width='100' height='200' class='card-img-top' alt='...'>
                    <p class='card-text mt-2'><strong>Tipo de propiedad: </strong>{$property->type}</p>
                    <p class='card-text'><strong>N° de habitaciones: </strong>{$property->rooms}</p>
                    <p class='card-text'><strong>Precio: $</strong>{$property->price}</p>
                    <p class='card-text'><strong>Area: </strong>{$property->area}mt</p>
                    <a href= 'http://localhost/WEBII/AirBnB_Propertys/Api/deleteProperty?id={$property->id}'card-link' class='btn btn-danger mr-5'>DELETE</a>
                    <a href= 'http://localhost/WEBII/AirBnB_Propertys/Api/updateProperty?id={$property->id}'card-link' class='btn btn-success ml-5'>UPDATE</a>
                    

                </div>
            </div>
        </div>
        
        
        
        
        ";
        
    echo $template;
    }
    ?>
    </div>
    </div>