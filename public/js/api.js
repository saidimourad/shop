
  
const baseUrl="https://la-mode.shop";
const apiKey="8I9SNSSLPNP2C93WKEXYVYGQ1S34PC7M";
const authorizationKey = btoa(apiKey);
console.log(authorizationKey);
			

   
   
   function GetCarList(variable) {
          let container = $('#pagination');
          itemsPerPage=5;
          pagination=false;
       
		 
		 if(variable===''){
			var urlApi=baseUrl+`/api/products?display=[id,manufacturer_name,reference,price,name,description,associations]&output_format=JSON`;

           
          } else 
          {
			  var urlApi=baseUrl+`/api/products?display=full&filter[name]=%['${variable}']%&output_format=JSON`;

		  }

         

            console.log(urlApi);
          
          async function fetchAsync () {
            
             let response = await   fetch(urlApi,

              {
                    headers: {
                    'Accept': 'application/json',
					'Authorization':'Basic OEk5U05TU0xQTlAyQzkzV0tFWFlWWUdRMVMzNFBDN006',
                  },
              })
			  
                let json = await response.json();
                   return json;
				   console.log(json);
              } 
			
              var msgHtml = ''; 
		         fetchAsync() .then(json => { 
              let result=json.products.length;
			  
			  console.log(result);
          
           container.pagination({
            dataSource: json.products ,
            pageSize: 6,
            callback: function (data, pagination) {
                
              var dataHtml = `<div class="row">`; 
                if(json.products.length>0){
                $.each(data, function (index, product) {
                    dataHtml +=` 
				
					
					
                        <div class="col-6 col-md-6 ">
						
							<div class="card m-2 text-center">
							  <img style="max-width:280px; max-height:300px" class="mx-auto m-1" src="https://la-mode.shop/api/images/products/${product.id}/${product.associations.images[0].id}" alt="Card image cap">
							  <div class="card-body">
								<h5 class="card-title">${product.name}</h5>
								<h5 class="text-info">${product.price} Dinars</h5>

								<p class="card-text">${product.description_short}</p>
								<a  class="btn btn-primary"  href="/product/detail/${product.id}">Détails</a>
							

							  </div>
							</div>
                        
                        
						  
						  
                        </div>`
                });
				
				 dataHtml +=` </div>`;
                $("#product_section").html(dataHtml);

                }
                else{
                  msgHtml += ` <div class="mt-2 alert alert-primary alert-dismissible fade show" role="alert">
                  <strong> Pas de véhicules</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div> `
                  $("#product_section").html(msgHtml);
                   }
                            

                
            }
        })
		
		
          })
          .catch(reason => {
       
                 msgHtml += ` <div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert">
                    <strong> Erreur de connexion</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div> ` 
                    $("#product_section").html(msgHtml);
                }
          
              );  
   } 
   
   
   
   
   
   