
// $.each(res,function(i,res){
    
//  if(res.status=='Completed'){
//   color="background:#28a745;color:white";
//  }
//  else if(res.status=='In Process'){
//   color="background:#ffc107;color:black";
//  }
//  else if(res.status=='Cancelled'){
//   color="background:#dc3545;color:white";
//  }
//   else if(res.status=='Pending-Lam1' || res.status=='Pending-Lam2' || res.status=='Pending-Slitting' || res.status=='Pending-Pouching' ||  res.status=='Pending-Rewind'){
//   color="background:#d484ce;color:white";
//  }
// else{
//   color="";
// }

//  html+='<tr id='+res.oid+' style="'+color+'">'+        
//     '<td>'+sno+'</td>'+
               
//             '<td>'+res.oid+'</td>'+
          
//              '<td >'+res.date_received+'</td>'+
//               '<td>'+res.date_commited+'</td>'+
//                   '<td><span style="visibility:hidden;font-size:0px!important;">'+res.machine+'</span><select  name="machine['+sno+']""  class="machine" style="width:70px"><option value="">Select M/C</option>'+
//                     '<?php $qry=DB::table("machine")->get();
//                     foreach($qry as $qry){;
//                     ?>'+
//                         '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res.machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
//                         '<?php } ?></select></td>'+
 
//                '<td>'+res.customer_name+'</td>'+
//                 '<td>'+res.product_name+'</td>'+
//                   '<td>'+res.qty+'</td>'+
//                     '<td><span style="visibility:hidden;font-size:0px!important;">'+res.priority+'</span><input value='+res.priority+' class="priority"  name="priority" style="width:50px"></td>'+
//                       '<td><span style="visibility:hidden;font-size:0px!important;">'+res.rate+'</span><input value='+res.rate+'  class="rate" name="rate['+sno+']"" style="width:70px"></td>'+
//                         '<td><span style="visibility:hidden;font-size:0px!important;">'+res.status+'</span><select  name="status['+sno+']" class="status" style="width:100px">'+
//                          '<option value="Not Started"  '+(res.status=='Not Started'?'Selected':'')+'>Not Started</option>'+
//                             '<option value="In Process"  '+(res.status=='In Process'?'Selected':'')+'>In Process</option>'+

//                        '<option value="Released"  '+(res.status=='Released'?'Selected':'')+'>Released</option>'+
                            
                       
//                            '<option value="Pending-Lam1"  '+(res.status=='Pending-Lam1'?'Selected':'')+'>Pending-Lam1</option>'+

//                            '<option value="Pending-Lam2"  '+(res.status=='Pending-Lam2'?'Selected':'')+'>Pending-Lam2</option>'+

//                            '<option value="Pending-Slitting"  '+(res.status=='Pending-Slitting'?'Selected':'')+'>Pending-Slitting</option>'+

//                            '<option value="Pending-Pouching"  '+(res.status=='Pending-Pouching'?'Selected':'')+'>Pending-Pouching</option>'+
//                               '<option value="Pending-Rewind"  '+(res.status=='PendingRewind'?'Selected':'')+'>Pending-Rewind</option>'+
//                                '<option value="Completed" '+(res.status=='Completed'?'Selected':'')+'>Completed</option>'+
                        
//                            '<option value="Cancelled"  '+(res.status=='Cancelled'?'Selected':'')+'>Cancelled</option>'+
//                                '<option value="Scheduled"  '+(res.status=='Scheduled'?'Selected':'')+'>Scheduled</option>'+
//                         '</select></td>'+
//                 '<td>'+res.name+'</td>'+
//                      '<td><span style="visibility:hidden;font-size:0px!important;">'+res.remarks+'</span><input value='+res.remarks+' class="remarks"  name="remarks['+sno+']"" style="width:150px"></td>'+
                  
//                 '<td>'+res.polyster_size+'</td>'+
//                 '<td>'+res.m_polyster_size+'</td>'+
//                 '<td>'+res.m_bopp_size+'</td>'+
//                 '<td>'+res.bopp_size+'</td>'+
//                 '<td>'+res.milky_poly_size+'</td>'+
//                 '<td>'+res.poly+'</td>'+
//                 '<td>'+res.perilized_size+'</td>'+
//                 '<td>'+res.total_polyster_wt+'</td>'+
//                      '<td>'+res.t_m_polyster_wt+'</td>'+
//                 '<td>'+res.t_m_bopp_wt+'</td>'+
//                 '<td>'+res.t_bopp_wt+'</td>'+
//                 '<td>'+res.t_milky_poly_wt+'</td>'+
//                 '<td>'+res.total_poly_wt+'</td>'+
//                 '<td>'+res.t_perilized_wt+'</td>'+
               
//                  '<td class="" style="visibility:hidden"><input value="'+res.oid+'" name=id['+sno+']></td>'+
             
                      
//                       '</tr>';
                
         
//            sno++;
//            count++;
        
// });
    // $("#gif").attr('style','display:none');