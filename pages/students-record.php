<div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>Students Record</b></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">

                
                 <?php
                  if(isset($_GET['status']) && $_GET['status'] === 'success'){
                      echo '<div class="alert alert-success"><i class="fa fa-check-circle"></i> <b>Success!</b> Data saved!</div>';
                    }else{
                      echo '<div class="alert alert-info"><i class="fa fa-envelope"></i> This screen displays students records</div>';                        
                  }
                ?>


                <table class="table">
                  <tr>
                    <thead>
                      <th><i class="fa fa-user"></i></th>
                      <th>Patient's Name</th>
                      <th>Course/Yr./Sec.</th>
                      <th>Age</th>
                      <th>Sex</th>
                      <th>ID No.</th>
                      <th>
                        <div class="input-group">
                          <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                          &nbsp;<button type="button" class="btn btn-primary"><i class="fas fa-search "> search </i></button>
                        </div>
                      </th>    
                    </thead>
                  </tr>
                  <tbody>
                    <?php
                      $query = "SELECT * FROM patient";
                      $res = mysqli_query($conn,$query);
                      while($rows = mysqli_fetch_assoc($res)):  
                    ?>
                    <tr>
                      <td><i class="fa fa-user"></i></td>
                      <td><?=$rows['first_name'];?> <?=$rows['middle_name'];?> <?=$rows['last_name'];?> <?=$rows['extension_name'];?> </td>
                      <td><?=$rows['course'];?> / <?=$rows['year'];?> / <?=$rows['section'];?></td>
                      <td><?=$rows['age'];?></td>
                      <td><?=$rows['sex'] == 1 ? "Male" : "Female";?></td>
                      <td><?=$rows['ID_number'];?></td>
                       <td >
                          <a class="btn btn-primary btn-sm dropdown-toggle" href="#" data-toggle="dropdown"><i class="fas fa-share-square"></i> Send</a>
                            <ul class="dropdown-menu">
                              <li>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/pages/medical-send.php?id=<?=$rows['id'];?>" class="fa fa-heartbeat"> Medical Records</a></li>
                              <li>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/pages/dental-send.php?id=<?=$rows['id'];?>" class="fa fa-hospital"> Dental Records</a></li>
                            </ul>
                          <a class="btn btn-info btn-sm" href="/?page=student-edit&id=<?=$rows['id'];?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <!--<a onclick="return delete_data('student-delete',<?=$rows['id'];?>);" class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i> Delete</a>-->
                        </td>
                    </tr>
                  <?php endwhile;?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                
              </div>
              <!-- /.card-footer-->
            </div>

