      <!-- teacher start -->
      <div class="teacher">
            <!-- heading start -->
            <div class="heading">
                <h3>Manage Class <button class="btn" id="addbtn">Add Class</button></h3>
            </div>
            <!-- heading end -->
             <!-- teacher table start -->
            <div class="tbody">
                <table id="manageTeacherTable">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Age</td>
                            <td>Email</td>
                            <td>Contact</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- teacher table end -->
            <!-- bg-modal start -->
            <div class="bg-modal">
              <!-- modal-content start -->
              <div class="modal-content">
                <form action="<?php echo site_url('Teacher/create')?>" method="post" enctype="multipart/form-data">
                  <div class="close">+</div>
                  <?php echo $error;?>
                  <div id="teacher_img">
                    <input type="file" name="teacher_image" onchange="loadFile(event)">
                    <img src="<?php echo base_url('assets/images/teacher.jpeg');?>" alt="Teacher" id="output">
                  </div>
                  <h6>Upload Image</h6>
                  <input type="text" name="teacher_name" placeholder="Name">
                  <input type="text"name="teacher_age" placeholder="Age">
                  <input type="text" name="teacher_email" placeholder="Email">
                  <input type="text" name="teacher_contact" placeholder="Contact">
                  <button class="btn" value="upload">Submit</button>
                </form>
              </div>
              <!-- modal-content end -->
            </div>
            <!-- bg-modal end -->
        </div>
      <!-- teacher end     -->
    </div>
    <!-- main end -->
  </div>
  <!-- container end -->
  <link rel="stylesheet" href="<?php echo site_url('assets/css/teacher.css');?>">
  <script src="<?php echo base_url('assets/datatables/media/js/jquery.dataTables.min.js')?>"></script>
  <script>
    function toggleMenu(){
      let toggle = document.querySelector('.toggle');
      let navigation = document.querySelector('.navigation');
      let main = document.querySelector('.main');
      toggle.classList.toggle('active');
      navigation.classList.toggle('active');
      main.classList.toggle('active');
    }
  </script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/teacher.js');?>"></script>
</body>
</html>