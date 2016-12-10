

$(function() {
	
	
	$('.init-tooltip').tooltip();
	
	
	
	
	var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };
    var randomColorFactor = function() {
        return Math.round(Math.random() * 255);
    };
    var randomColor = function(opacity) {
        return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
    };

    var config = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                ],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                    "#FDB45C",
                    "#949FB1",
                    "#4D5360",
                ],
                label: 'Dataset 1'
            }, {
                hidden: true,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                ],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                    "#FDB45C",
                    "#949FB1",
                    "#4D5360",
                ],
                label: 'Dataset 2'
            }, {
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                ],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                    "#FDB45C",
                    "#949FB1",
                    "#4D5360",
                ],
                label: 'Dataset 3'
            }],
            labels: [
                "Email Sent",
                "Email Opened",
                "In Progress",
                "Submitted",
                "Closed"
            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Summary Status'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    };

    window.onload = function() {
        //var cts = document.getElementById("chart-area").getContext("2d");
        //window.myDoughnut = new Chart(ctx, config);
    };

    $('#randomizeData').click(function() {
        $.each(config.data.datasets, function(i, dataset) {
            dataset.data = dataset.data.map(function() {
                return randomScalingFactor();
            });

            dataset.backgroundColor = dataset.backgroundColor.map(function() {
                return randomColor(0.7);
            });
        });

        window.myDoughnut.update();
    });

    $('#addDataset').click(function() {
        var newDataset = {
            backgroundColor: [],
            data: [],
            label: 'New dataset ' + config.data.datasets.length,
        };

        for (var index = 0; index < config.data.labels.length; ++index) {
            newDataset.data.push(randomScalingFactor());
            newDataset.backgroundColor.push(randomColor(0.7));
        }

        config.data.datasets.push(newDataset);
        window.myDoughnut.update();
    });

    $('#addData').click(function() {
        if (config.data.datasets.length > 0) {
            config.data.labels.push('data #' + config.data.labels.length);

            $.each(config.data.datasets, function(index, dataset) {
                dataset.data.push(randomScalingFactor());
                dataset.backgroundColor.push(randomColor(0.7));
            });

            window.myDoughnut.update();
        }
    });

    $('#removeDataset').click(function() {
        config.data.datasets.splice(0, 1);
        window.myDoughnut.update();
    });

    $('#removeData').click(function() {
        config.data.labels.splice(-1, 1); // remove the label first

        config.data.datasets.forEach(function(dataset, datasetIndex) {
            dataset.data.pop();
            dataset.backgroundColor.pop();
        });

        window.myDoughnut.update();
    });
	
	
	
	//var amsterdam=new google.maps.LatLng(13.0878400,80.2784700);
		function initialize()
		{
			
		var mapProp = {
		  center:amsterdam,
		  zoom:8,
		  mapTypeId:google.maps.MapTypeId.ROADMAP
		  };
		  
		var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

		var myCity = new google.maps.Circle({
		  center:amsterdam,
		  radius:20000,
		  strokeColor:"#0000FF",
		  strokeOpacity:0.8,
		  strokeWeight:2,
		  fillColor:"#0000FF",
		  fillOpacity:0.4
		  });

		myCity.setMap(map);
		}

		//google.maps.event.addDomListener(window, 'load', initialize);
	
	
	
	
	
	$('#assignJobModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var recipient = button.data('whatever') // Extract info from data-* attributes
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		
		setTimeout(function(){ $(".loaderParent").addClass("hide");$(".dash-ind-job-stat").removeClass("hide"); }, 3000);
		
		

		var modal = $(this)
		modal.find('.modal-title').text('Work progress for' + recipient)
		//modal.find('.modal-body input').val(recipient)
	})
	
	
	var date = new Date();
	var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
	
	$('#startdate').datetimepicker({
                minDate: today,
				//format:'yyyy-dd-mm h:r:s'
            });
	var datetime = $('#complaint_dates').val();
	
	
	$(".dash-ind-job-stat .panel-body").mCustomScrollbar({
		setHeight:340,
		theme:"minimal-dark"
	});
    
	$('.jobManipulation').on('click', function (event) {
		$(".search-dash").slideToggle();
	
	});
	
	
	
	
	$(".ven-profile").popover({ trigger: "manual" , html: true, animation:true, content: function() {
			  return $('#popover-content').html();
			}}).on("mouseenter", function () {
				//alert();
				var _this = this;
				$(this).popover("show");
				$(".popover").on("mouseleave", function () {
					$(_this).popover('hide');
				});
			}).on("mouseleave", function () {
				var _this = this;
				setTimeout(function () {
					if (!$(".popover:hover").length) {
						$(_this).popover("hide");
					}
				}, 300);
	});	
	
	
	$(".job-completed-rating").popover({ trigger: "manual" , html: true, content: function() {
			  return $('.job-completed-rating-content').html();
			}}).on("mouseenter", function () {
				//alert();
				var _this = this;
				$(this).popover("show");
				$(".popover").on("mouseleave", function () {
					$(_this).popover('hide');
				});
			}).on("mouseleave", function () {
				var _this = this;
				setTimeout(function () {
					if (!$(".popover:hover").length) {
						$(_this).popover("hide");
					}
				}, 300);
	});
	
	
	
	$(".job-completed-statement").popover({ trigger: "manual" , html: true, content: function() {
			  return $('.job-completed-statement-content').html();
			}}).on("mouseenter", function () {
				//alert();
				var _this = this;
				$(this).popover("show");
				$(".popover").on("mouseleave", function () {
					$(_this).popover('hide');
				});
			}).on("mouseleave", function () {
				var _this = this;
				setTimeout(function () {
					if (!$(".popover:hover").length) {
						$(_this).popover("hide");
					}
				}, 300);
	});
	
	
	
	
	
	// Array holding selected row IDs
   var rows_selected = [];
   var table = $('#complaintsTable').DataTable({
	   
	    //stateSave: true
     /* 'ajax': {
         'url': '/lab/articles/jquery-datatables-checkboxes/ids-arrays.txt' 
      },*/
      'columnDefs': [{
         'targets': 0,
         'searchable': false,
        'orderable': false,
         
         'className': 'dt-body-center'
      }],
      //'order': [[1, 'asc']],
      'rowCallback': function(row, data, dataIndex){
         // Get row ID
         var rowId = data[0];

         // If row ID is in the list of selected row IDs
         if($.inArray(rowId, rows_selected) !== -1){
            $(row).find('input[type="checkbox"]').prop('checked', true);
            $(row).addClass('selected');
         }
      }
   });

   // Handle click on checkbox
   $('#complaintsTable tbody').on('click', 'input[type="checkbox"]', function(e){
      var $row = $(this).closest('tr');

      // Get row data
      var data = table.row($row).data();
//console.log(data);
      // Get row ID
      var rowId = data[0];
	  //console.log(rowId);

      // Determine whether row ID is in the list of selected row IDs 
      var index = $.inArray(rowId, rows_selected);

      // If checkbox is checked and row ID is not in list of selected row IDs
      if(this.checked && index === -1){
         rows_selected.push(rowId);

      // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
      } else if (!this.checked && index !== -1){
         rows_selected.splice(index, 1);
      }

      if(this.checked){
         $row.addClass('selected');
      } else {
         $row.removeClass('selected');
      }

      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });
   
   

   // Handle click on table cells with checkboxes
   $('#complaintsTable').on('click', 'tbody td, thead th:first-child', function(e){
      $(this).parent().find('input[type="checkbox"]').trigger('click');
   });

   // Handle click on "Select all" control
   $('thead input[name="select_all"]', table.table().container()).on('click', function(e){
      if(this.checked){
         $('#complaintsTable tbody input[type="checkbox"]:not(:checked)').trigger('click');
      } else {
         $('#complaintsTable tbody input[type="checkbox"]:checked').trigger('click');
      }

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });

   // Handle table draw event
   table.on('draw', function(){
      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);
   });

   // Handle form submission event 
   $('#frm-example').on('submit', function(e){
      var form = this;
      
      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
         // Create a hidden element 
         $(form).append(
            $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id[]')
                .val(rowId)
				
         );
      });
   });	

   
   $('#input-group-addon').on('click', function(){
			var datetime = $('#complaint_dates').val();
			$('#complaint_date').val(datetime);
		});		
		$.get("{{ url('/api/today_count')}}",{ 'today': 1 },function(data) {          
				$('#today_task').append(data);
				$('#dashboardtoday_task').append(data);
				$('#topcounts').append(data);
				var pers = Math.round(data) + '%';
				$('#dashboardtoday_percentage').append(pers);
			});	
		$.get("{{ url('/api/weekend')}}",{ 'today': 1 },function(data) {          
				var pers = Math.round(data) + '%';
				$('#weeklycustm').append(pers);
				$('#weeklycustms').append(data);
			});	
		$.get("{{ url('/api/monthly')}}",{ 'today': 1 },function(data) {          
				var pers = Math.round(data) + '%';
				$('#monthly').append(pers);
				$('#monthlys').append(data);
			});	

		$.get("{{ url('/api/pending')}}",{ 'today': 1 },function(data) {          
				var pers = Math.round(data) + '%';
				$('#pending').append(pers);
				$('#pendings').append(data);
			});	
			
		$('.searchBtn').click(function(){	
					
			var service = $("#service").val();
			var select_state = $("#select_state").val();				
			var track_order = $("#track_order").val();
			var order_status = $("#order_status").val();
			var select_assign = $("#select_assign").val();
			//alert(select_assign);
			$('#home').empty();
			$.get("{{ url('/api/activedashboard')}}",{ 'service': service,'select_state':select_state,'track_order':track_order,'order_status':order_status,'select_assign':select_assign },function(data) {					
				$('#home').addClass('in active');               
				$('#home').append(data);
				$('#complaintsunassign').removeClass('in active'); 
				$('#complaintsunassign').empty();
				$('#complaints_assign').removeClass('in active');        
				$('#complaints_assign').empty();
				$('#complaints_inprogress').removeClass('in active');      
				$('#complaints_inprogress').empty();
				$('#complaints_cancelled').removeClass('in active');       
				$('#complaints_cancelled').empty();
				$('#complaints_today').removeClass('in active');      
				$('#complaints_today').empty();
				$('#complaints_week').removeClass('in active');      
				$('#complaints_week').empty();
				$('#complaints_monthly').removeClass('in active');      
				$('#complaints_monthly').empty();
			});								
			
		});	
		$('#home_all').click(function(){
			  
			  var service = $("#service").val();
			var select_state = $("#select_state").val();				
			var track_order = $("#track_order").val();
			var order_status = $("#order_status").val();
			var select_assign = $("#select_assign").val();
			//alert(select_assign);
			$('#home').empty();
			$.get("{{ url('/api/activedashboard')}}",{ 'service': service,'select_state':select_state,'track_order':track_order,'order_status':order_status,'select_assign':select_assign },function(data) {					
				$('#home').addClass('in active');               
				$('#home').append(data);
				$('#complaintsunassign').removeClass('in active'); 
				$('#complaintsunassign').empty();
				$('#complaints_assign').removeClass('in active');        
				$('#complaints_assign').empty();
				$('#complaints_inprogress').removeClass('in active');      
				$('#complaints_inprogress').empty();
				$('#complaints_cancelled').removeClass('in active');       
				$('#complaints_cancelled').empty();
				$('#complaints_today').removeClass('in active');      
				$('#complaints_today').empty();
				$('#complaints_week').removeClass('in active');      
				$('#complaints_week').empty();
				$('#complaints_monthly').removeClass('in active');      
				$('#complaints_monthly').empty();
			});	
		 });

		//Country Change
		$('#country_id').on('change', function(){
		country=$('#country_id').val();
			
		$.get("{{ url('/api/dropdown_country')}}",{ option: country },
		function(data) {				
			$('#state_id').empty();
			//$('#region_id').find('option').remove().end();
			$('#state_id').append('<option value="">Select State</option>');
			$.each(data, function(key, element) {		
			$('#state_id').append('<option value="' + key +'">' + element + '</option>');
			});
			});			
		});
		//state change
		$('#state_id').on('change', function(){				
		state=$('#state_id').val();				
		$.get("{{ url('/api/dropdown_city')}}",{ option: state },
		function(data) {				
			$('#city_id').empty();
			//$('#region_id').find('option').remove().end();
			//$('#region_id').append('<select name="region" class="form-control	" >');
			$('#city_id').append('<option value="">Select City</option>');
			$.each(data, function(key, element) {		
			$('#city_id').append('<option value="' + key +'">' + element + '</option>');
			});
			
			});
		});				
		
		
	$('#unass_select').click(function(){
			//alert(status);
			var cst_sta = 'unassigned';
			$('#complaintsunassign').empty();
			$.get("{{ url('/api/unassigned')}}",{ 'custom_status': cst_sta },function(data) {
				$('#home').removeClass('in active');        
				$('#home').empty();  
				$('#complaintsunassign').addClass('in active'); 
				$('#complaintsunassign').append(data);
				$('#complaints_assign').removeClass('in active');        
				$('#complaints_assign').empty();
				$('#complaints_inprogress').removeClass('in active');      
				$('#complaints_inprogress').empty();
				$('#complaints_cancelled').removeClass('in active');       
				$('#complaints_cancelled').empty();
				$('#complaints_today').removeClass('in active');      
				$('#complaints_today').empty();
				$('#complaints_week').removeClass('in active');      
				$('#complaints_week').empty();
				$('#complaints_monthly').removeClass('in active');      
				$('#complaints_monthly').empty();
			});
			
		});	
	$('#autos-assignsed').click(function(){
			//alert(status);
			var cstassign = 'assigned';
			$('#complaints_assign').empty();
			$.get("{{ url('/api/assigned')}}",{ 'custom_assign': cstassign },function(data) {      
				$('#home').removeClass('in active');        
				$('#home').empty();  
				$('#complaintsunassign').removeClass('in active'); 
				$('#complaintsunassign').empty();
				$('#complaints_assign').addClass('in active');        
				$('#complaints_assign').append(data);
				$('#complaints_inprogress').removeClass('in active');      
				$('#complaints_inprogress').empty();
				$('#complaints_cancelled').removeClass('in active');       
				$('#complaints_cancelled').empty();
				$('#complaints_today').removeClass('in active');      
				$('#complaints_today').empty();
				$('#complaints_week').removeClass('in active');      
				$('#complaints_week').empty();
				$('#complaints_monthly').removeClass('in active');      
				$('#complaints_monthly').empty();
			});
			
		});	
	$('#in-progressactive').click(function(){
			//alert(status);
			var inprogr = 'inprogress';
			$('#complaints_inprogress').empty();
			$.get("{{ url('/api/inprogress')}}",{ 'custom_inpro': inprogr },function(data) { 
				$('#home').removeClass('in active');        
				$('#home').empty();  
				$('#complaintsunassign').removeClass('in active'); 
				$('#complaintsunassign').empty();
				$('#complaints_assign').removeClass('in active');        
				$('#complaints_assign').empty();
				$('#complaints_inprogress').addClass('in active');      
				$('#complaints_inprogress').append(data);
				$('#complaints_cancelled').removeClass('in active');       
				$('#complaints_cancelled').empty();
				$('#complaints_today').removeClass('in active');      
				$('#complaints_today').empty();
				$('#complaints_week').removeClass('in active');      
				$('#complaints_week').empty();
				$('#complaints_monthly').removeClass('in active');      
				$('#complaints_monthly').empty();
			});
			
		});	
	$('#custom_cancelled').click(function(){
			//alert(status);
			var cancle = 'cancelled';
			$('#complaints_cancelled').empty();
			$.get("{{ url('/api/cus_cancel')}}",{ 'custom_cancle': cancle },function(data) {
				$('#home').removeClass('in active');        
				$('#home').empty();  
				$('#complaintsunassign').removeClass('in active'); 
				$('#complaintsunassign').empty();
				$('#complaints_assign').removeClass('in active');        
				$('#complaints_assign').empty();
				$('#complaints_inprogress').removeClass('in active');      
				$('#complaints_inprogress').empty();
				$('#complaints_cancelled').addClass('in active');       
				$('#complaints_cancelled').append(data);
				$('#complaints_today').removeClass('in active');      
				$('#complaints_today').empty();
				$('#complaints_week').removeClass('in active');      
				$('#complaints_week').empty();
				$('#complaints_monthly').removeClass('in active');      
				$('#complaints_monthly').empty();					
			});
			
		});	
		
	$('#today_view').click(function(){
			//alert(status);
			$('#complaints_today').empty();
			$.get("{{ url('/api/viewtoday')}}",{ 'custom_day': 1 },function(data) { 
				$('#home').removeClass('in active');        
				$('#home').empty();  
				$('#complaintsunassign').removeClass('in active'); 
				$('#complaintsunassign').empty();
				$('#complaints_assign').removeClass('in active');        
				$('#complaints_assign').empty();
				$('#complaints_inprogress').removeClass('in active');      
				$('#complaints_inprogress').empty();
				$('#complaints_cancelled').removeClass('in active');       
				$('#complaints_cancelled').empty();
				$('#complaints_today').addClass('in active');      
				$('#complaints_today').append(data);
				$('#complaints_week').removeClass('in active');      
				$('#complaints_week').empty();
				$('#complaints_monthly').removeClass('in active');      
				$('#complaints_monthly').empty();
				
			});
			
		});	
	$('#today_views').click(function(){
			//alert(status);
			$('#complaints_today').empty();
			$.get("{{ url('/api/viewtoday')}}",{ 'custom_day': 1 },function(data) { 
				$('#home').removeClass('in active');        
				$('#home').empty();  
				$('#complaintsunassign').removeClass('in active'); 
				$('#complaintsunassign').empty();
				$('#complaints_assign').removeClass('in active');        
				$('#complaints_assign').empty();
				$('#complaints_inprogress').removeClass('in active');      
				$('#complaints_inprogress').empty();
				$('#complaints_cancelled').removeClass('in active');       
				$('#complaints_cancelled').empty();
				$('#complaints_today').addClass('in active');      
				$('#complaints_today').append(data);
				$('#complaints_week').removeClass('in active');      
				$('#complaints_week').empty();
				$('#complaints_monthly').removeClass('in active');      
				$('#complaints_monthly').empty();
				
			});
			
		});		
	$('#weekend_view').click(function(){
			//alert(status);
			$('#complaints_week').empty();
			$.get("{{ url('/api/viewweekend')}}",{ 'custom_day': 1 },function(data) { 
				$('#home').removeClass('in active');        
				$('#home').empty();  
				$('#complaintsunassign').removeClass('in active'); 
				$('#complaintsunassign').empty();
				$('#complaints_assign').removeClass('in active');        
				$('#complaints_assign').empty();
				$('#complaints_inprogress').removeClass('in active');      
				$('#complaints_inprogress').empty();
				$('#complaints_cancelled').removeClass('in active');       
				$('#complaints_cancelled').empty();
				$('#complaints_today').removeClass('in active');      
				$('#complaints_today').empty();
				$('#complaints_week').addClass('in active');      
				$('#complaints_week').append(data);
				$('#complaints_monthly').removeClass('in active');      
				$('#complaints_monthly').empty();
			});				
		});		
		
		$('#monthly_view').click(function(){
			//alert(status);
			$('#complaints_monthly').empty();
			$.get("{{ url('/api/viewmonthly')}}",{ 'custom_day': 1 },function(data) { 
				$('#home').removeClass('in active');        
				$('#home').empty();  
				$('#complaintsunassign').removeClass('in active'); 
				$('#complaintsunassign').empty();
				$('#complaints_assign').removeClass('in active');        
				$('#complaints_assign').empty();
				$('#complaints_inprogress').removeClass('in active');      
				$('#complaints_inprogress').empty();
				$('#complaints_cancelled').removeClass('in active');       
				$('#complaints_cancelled').empty();
				$('#complaints_today').removeClass('in active');      
				$('#complaints_today').empty();
				$('#complaints_week').removeClass('in active');      
				$('#complaints_week').empty();
				$('#complaints_monthly').addClass('in active');      
				$('#complaints_monthly').append(data);
			});				
		});	

		$('#pending_view').click(function(){
			$('#complaints_pending').empty();
			$.get("{{ url('/api/viewpending')}}",{ 'custom_day': 1  },function(data) { 
				$('#home').removeClass('in active');        
				$('#home').empty();  
				$('#complaintsunassign').removeClass('in active'); 
				$('#complaintsunassign').empty();
				$('#complaints_assign').removeClass('in active');        
				$('#complaints_assign').empty();
				$('#complaints_inprogress').removeClass('in active');      
				$('#complaints_inprogress').empty();
				$('#complaints_cancelled').removeClass('in active');       
				$('#complaints_cancelled').empty();
				$('#complaints_today').removeClass('in active');      
				$('#complaints_today').empty();
				$('#complaints_week').removeClass('in active');      
				$('#complaints_week').empty();
				$('#complaints_monthly').addClass('in active');      
				$('#complaints_monthly').append(data);
			});				
		});	
		
		$('.multi_sel_del').on('click', function(e) { 
					var allVals = [];  
						$(".sub_chk:checked").each(function() {  
							allVals.push($(this).attr('data-id'));
							//alert();
						});  
				//alert(allVals.length); return false;  
						if(allVals.length <=0)  
						{  
							alert("Please select row.");  
						}  
						else {  
							//$("#loading").show(); 
							WRN_PROFILE_DELETE = "Are you sure you want to delete this row?";  
							var check = confirm(WRN_PROFILE_DELETE);  
							if(check == true){  
								var join_selected_values = allVals.join(",");
								$.get("{{ url('/api/delete_cusids')}}", { cust_id: join_selected_values },
								function(data) {                
									if(data =='1'){
										alert('Your Track Work Order has been deleted!');
										//location.reload();
										$('table#complaintsTable tr.selected').remove();
									}
								});
							  //$.each(allVals, function( index, value ) {
								  
							  //});                        
							}  
						}  
					});
   
});

/////////////////////////////////////////////////////////////////////////////////////////////mounica


//
// Updates "Select all" control in a data table
//
function updateDataTableSelectAllCtrl(table){
   var $table             = table.table().node();
   var $chkbox_all        = $('tbody input[type="checkbox"]', $table);
   var $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);
   var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);

   // If none of the checkboxes are checked
   if($chkbox_checked.length === 0){
      chkbox_select_all.checked = false;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = false;
      }

   // If all of the checkboxes are checked
   } else if ($chkbox_checked.length === $chkbox_all.length){
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = false;
      }

   // If some of the checkboxes are checked
   } else {
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = true;
      }
   }
}

function config_delete(delet_id){
	//alert(delet_id);
	if (confirm('Are you sure you want to delete?')) {			
			$.get("{{ url('/api/delete_cusid')}}",{ cust_id: delet_id },
			function(data) {				
				if(data =='1'){
					alert('Your Track Work Order has been deleted!');
					location.reload();
				}
				});
		}
}

function emp_load(assgin_complatid){
 //alert(assgin_complatid);
 $.get("{{ url('/api/employee_assign')}}",{ 'assgin_complatid': assgin_complatid },function(data) { 
	$('#employee_showdetails').empty();          
	$('#employee_showdetails').append(data);
 });
} 
function viewAppoints(empid){
		
	$('#appointmentsTableBody').empty();
	$('#appointmentsDiv').show();
	//alert(empid);
	$.get("{{ url('/api/viewAppointments')}}",{ 'empid': empid },function(data) {
			//alert(data);
			
			reload_override_table(data);
	});		
			
}
function reload_override_table(data){				
		$.each(data, function(key, element) {					
			var str = '<tr class="odd gradeX">\
							<td>'+element["complaint_code"]+'</td>\
							<td>'+element["customer_name"]+'</td>\
							<td>'+element["complaint_date"]+'</td>\
							<td>'+element["employee_name"]+'</td>\
							<td>'+element["status"]+'</td>\
							<td class="center"><div class="desc">'+element["complaint_desc"]+'</div></td>\
						</tr>';
			
			$('#appointmentsTableBody').append(str);			
		
		});
							
		
}












