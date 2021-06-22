

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class = "card-wrapper">
  <div class = "card">
    <!-- card left -->
    <div class = "product-imgs">
      <div class = "img-display">
        <div class = "img-showcase">
          <img src = "{{asset('uploads/'.$single_car[0]['photos'])}}" alt = "shoe image">
          <img src = "{{asset('uploads/'.$single_car[0]['photos'])}}" alt = "shoe image">
          <img src = "{{asset('uploads/'.$single_car[0]['photos'])}}" alt = "shoe image">
          <img src = "{{asset('uploads/'.$single_car[0]['photos'])}}" alt = "shoe image">
        </div>
      </div>
      <div class = "img-select">
        <div class = "img-item">
          <a href = "#" data-id = "1">
            <img src = "{{asset('uploads/'.$single_car[0]['photos'])}}" alt = "shoe image">
          </a>
        </div>
        <div class = "img-item">
          <a href = "#" data-id = "2">
            <img src = "{{asset('uploads/'.$single_car[0]['photos'])}}" alt = "shoe image">
          </a>
        </div>
        <div class = "img-item">
          <a href = "#" data-id = "3">
            <img src = "{{asset('uploads/'.$single_car[0]['photos'])}}" alt = "shoe image">
          </a>
        </div>
        <div class = "img-item">
          <a href = "#" data-id = "4">
            <img src = "{{asset('uploads/'.$single_car[0]['photos'])}}" alt = "shoe image">
          </a>
        </div>
      </div>
    </div>
    <!-- card right -->
    <div class = "product-content">
      <h2 class = "product-title">{{$single_car[0]['brand']}}</h2>
     
      <div class = "product-rating">
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star-half-alt"></i>
        
      </div>

      <div class = "product-price">
        <p class = "last-price">Price: <span>{{$single_car[0]['price']}}</span></p>
        
      </div>

      <div class = "product-detail">
        <h2>Description: </h2>
        <p>{{$single_car[0]['description']}}</p>
        <ul>
          <li>Mileage: <span>{{$single_car[0]['mileage']}}</span></li>
          <li>Seats: <span>{{$single_car[0]['seats']}}</span></li>
          
        </ul>
      </div>

      <div class = "purchase-info">
       
        <button type = "button" id="rate" class = "btn">Rate</button>
      </div>

    <div class = "rating" style="display: none">
        <div class="container">	
        	<form id="">
        		<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
        		<input type="hidden" name="product" id="productid" value="{{$single_car[0]['id']}}">
				Mileage: 
					<div class="mileage">
			        <span class="fa fa-star" id="mi1" data-id="1"></span>
					<span class="fa fa-star " id="mi2" data-id="2" ></span>
					<span class="fa fa-star " id="mi3" data-id="3" ></span>
					<span class="fa fa-star" id="mi4" data-id="4"> </span>
					<span class="fa fa-star" id="mi5" data-id="5"></span><br>
					</div>
				Maintenance:
				<div class="mai"> 
			        <span class="fa fa-star " id="mai1" data-id="1"></span>
					<span class="fa fa-star " id="mai2" data-id="2"></span>
					<span class="fa fa-star " id="mai3" data-id="3"></span>
					<span class="fa fa-star" id="mai4" data-id="4"></span>
					<span class="fa fa-star" id="mai5" data-id="5"></span><br>
				</div>
				Comfort: 
				<div class="comfort">
			        <span class="fa fa-star " id="c1" data-id="1"></span>
					<span class="fa fa-star " id="c2" data-id="2"></span>
					<span class="fa fa-star " id="c3" data-id="3"></span>
					<span class="fa fa-star" id="c4" data-id="4"></span  >
					<span class="fa fa-star" id="c5" data-id="5"></span><br>
				</div>
		</div>
    </div>
    </div>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

$('#rate').click(function(){
	$('.rating').show();

});
$('.fa.fa-star').click(function(){

	var ratevalue = $(this).attr("data-id");


	//getting the id of the clicked element
	var id = $(this).attr('id');

	//getting the name from the id
	var start = id.startsWith('mi')?"mi":0;
	if(start==0)start = id.startsWith('mai')?"mai":0;
	if(start==0)start = id.startsWith('c')?"c":0;

	//getting the num from the id
	num = parseInt(id.match(/\d/g).join(""));
	
	// id of the element clicked
	let par = start+num.toString();
	for(let i=1;i<=5;i++)
	{
		//if the number of element is smaller than the clicked element then we have to check or uncheck accordingly.
		if(i<=num)
		{
			// getting the id of the element
			let j = start+i.toString();

			//from the id of the element getting the element .
			let ele = document.getElementById(j);
			// console.log(j,"\n",ele);
			
			//condition
			if(!document.getElementById(par).classList.contains('checked'))
			ele.classList.add("checked");
			else
			ele.classList.remove('checked');
		}
		else
		{
			//if the number of element is greater than the clicked element then we have to uncheck it.
			let j = start+i.toString();
			let ele = document.getElementById(j);
			ele.classList.remove('checked');
		}
	}
	

	
	var carid = $('#productid').val();
	var token = $('#token').val();
	var ratetype = $(this).parent().attr('class');

	if(document.getElementById(par).classList.contains('checked'))
		ratevalue=num;
	else
		ratevalue=0;

	var data = {  
              "_token"       : token,
              "car_id"		 :carid,
              "ratetype"	 :ratetype,
              "ratevalue"	 :ratevalue,
        };
	$.ajax({
		  	type: "POST",
		  	url: "http://localhost:8000/rate-store" ,
		  	data: data,
		  	success: function(data)
           {   
               
              
           }
		});

});

</script>




