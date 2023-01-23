<?php include('connection.php'); 

session_start();

$userId = $_SESSION['id'];

$selectID = "SELECT * FROM `users` WHERE id = '$userId'";
$search = $con->query($selectID);
$fetchID = $search->fetch_assoc();


if($_SESSION['role'] == 'invalid'){

  header('Location: index.php');

}

if(isset($_POST['logout'])){
    unset($_SESSION['role']);
    unset($_SESSION['id']);

    sleep(1);

    header('Location: index.php');
}


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap5.0.1.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/datatables-1.10.25.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/dashboard.css"/>
  <link rel="shortcut icon" href="https://sdovalenzuelacity.deped.gov.ph/wp-content/uploads/2021/04/New-DO-Logo.png" type="image/x-icon">
  <title>Equipments</title>
  <style type="text/css">
    .btnAdd {
      text-align: right;
      width: 90%;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="nav_wrapper bg-light">
    <div class="close_nav_wrapper">
      <div class="d-block ms-auto me-3 fs-3">&#128473;</div>
    </div>
    <nav>
      <div><img class="d-block mx-auto" width="100px" height="100px" src="https://sdovalenzuelacity.deped.gov.ph/wp-content/uploads/2021/04/New-DO-Logo.png" alt="logo"></div>
      <ul>
        <li>Dashboard</li>
        <li data-bs-toggle="modal" data-bs-target="#addSchool">Add School</li>
        <li>School List</li>
      </ul>
    </nav>
  </div>
  <header>
    <div id="menuBtn">
      <span><i class="fa-solid fa-bars fs-3" style="color: whitesmoke"></i></span>
    </div>
    <div>
      <span><i class="fa-solid fa-user fs-4 mt-1" style="color: whitesmoke"></i></span>
      <div class="dropdown">
        <a class="text-decoration-none dropdown-toggle ps-1" style="color: whitesmoke" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $fetchID['email']?>
        </a>

        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li><a class="dropdown-item" href="#">
          <form action="" method="post">
            <input type="submit" class="btn btn-danger btn-sm mt-2" name="logout" value="LOGOUT">
          </form>
          </a></li>
        </ul>
      </div>
    </div>
  </header>
  <div class="container-fluid mx-auto" style="width: 80%;">
    <h2 class="text-center mt-5">Gen T. De Leon National Highschool</h2>
    <div class="row">
      <div class="container">
        <div class="btnAdd w-100">
          <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addUserModal" class="btn btn-success btn-sm">Add Data</a>
        </div>
        <div class="row">
          <!-- <div class="col-md-1"></div> -->
          <div class="col-md-12">
            <table id="example" class="table">
              <thead>
                <th>Item No.</th>
                <th>Code</th>
                <th>Article</th>
                <th>Description</th>
                <th>Date Acquired</th>
                <th>Unit Value</th>
                <th>Total Value</th>
                <th>Source of Fund</th>
                <th>Options</th>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <!-- <div class="col-md-1"></div> -->
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="addSchool" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add School</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="schoolName" placeholder="name@example.com">
        <label>School Name</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="address" placeholder="Password">
        <label>Address</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="principalName" placeholder="Password">
        <label>Principal Name</label>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id='addSchoolBtn' data-bs-dismiss="modal">Add School</button>
      </div>
    </div>
  </div>
</div>
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/dt-1.10.25datatables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable({
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'fetch_data.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [5]
          },

        ]
      });
    });
    $(document).on('click','#addSchoolBtn',function(){
      const school = $("#schoolName").val();
      const address = $("#address").val();
      const pName = $("#principalName").val();

      $.ajax({
        url: "add_school.php",
        type: "post",
        data: {
          school : school,
          address : address,
          pName : pName
        },
        success:function(e){
          // $("#test").html(e);
          $("#schoolName").val("");
          $("#address").val("");
          $("#principalName").val("");
          
          // $("#addSchool").hide();
          // alert("Add Success!")
        }
      })
    })
    $(document).on('submit', '#addUser', function(e) {
      e.preventDefault();
      var code = $('#addCodeField').val();
      var article = $('#addArticleField').val();
      var date = $('#addDateField').val();
      var unitValue = $('#addUnitValueField').val();
      var totalValue = $('#addTotalValueField').val();
      var sourceOfFund = $('#addSourceOfFundField').val();
      var description = $('#addDescriptionField').val();
      if (description != '' && code != '' && unitValue != '' && totalValue != '' && sourceOfFund != '') {
        $.ajax({
          url: "add_user.php",
          type: "post",
          data: {
            code: code,
            article: article,
            date: date,
            unitValue: unitValue,
            totalValue: totalValue,
            sourceOfFund: sourceOfFund,
            description: description
          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              mytable = $('#example').DataTable();
              mytable.draw();
              $('#addUserModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });
    $(document).on('submit', '#updateUser', function(e) {
      e.preventDefault();
      //var tr = $(this).closest('tr');
      var code = $('#codeField').val();
      var article = $('#articleField').val();
      var date = $('#dateField').val();
      var unitValue = $('#unitValueField').val();
      var totalValue = $('#totalValueField').val();
      var sourceOfFund = $('#sourceOfFundField').val();
      var trid = $('#trid').val();
      var id = $('#id').val();
      var description = $('#descriptionField').val();
      if (description != '' && code != '' && unitValue != '' && totalValue != '' && sourceOfFund != '') {
        $.ajax({
          url: "update_user.php",
          type: "post",
          data: {
            code: code,
            article: article,
            date: date,
            unitValue: unitValue,
            totalValue: totalValue,
            sourceOfFund: sourceOfFund,
            id: id,
            description: description
          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              table = $('#example').DataTable();
              // table.cell(parseInt(trid) - 1,0).data(id);
              // table.cell(parseInt(trid) - 1,1).data(username);
              // table.cell(parseInt(trid) - 1,2).data(email);
              // table.cell(parseInt(trid) - 1,3).data(mobile);
              // table.cell(parseInt(trid) - 1,4).data(city);
              var button = '<td><a href="javascript:void();" data-id="' + id + '" class="btn btn-info btn-sm editbtn">Edit</a>  <a href="#!"  data-id="' + id + '"  class="btn btn-danger btn-sm deleteBtn">Delete</a></td>';
              var row = table.row("[id='" + trid + "']");
              row.row("[id='" + trid + "']").data([id, code, article,date, unitValue, totalValue, sourceOfFund, description, button]);
              $('#exampleModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });
    $('#example').on('click', '.editbtn ', function(event) {
      var table = $('#example').DataTable();
      var trid = $(this).closest('tr').attr('id');
      var id = $(this).data('id');
      $('#exampleModal').modal('show');

      $.ajax({
        url: "get_single_data.php",
        data: {
          id: id
        },
        type: 'post',
        success: function(data) {
          var json = JSON.parse(data);
          $('#codeField').val(json.code);
          $('#articleField').val(json.article);
          $('#dateField').val(json.date);
          $('#unitValueField').val(json.unitValue);
          $('#totalValueField').val(json.totalValue);
          $('#sourceOfFundField').val(json.sourceOfFund);
          $('#descriptionField').val(json.description);
          $('#id').val(id);
          $('#trid').val(trid);
        }
      })
    });

    $(document).on('click', '.deleteBtn', function(event) {
      var table = $('#example').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if (confirm("Are you sure you want to delete this data? ")) {
        $.ajax({
          url: "delete_user.php",
          data: {
            id: id
          },
          type: "post",
          success: function(data) {
            var json = JSON.parse(data);
            status = json.status;
            if (status == 'success') {
              $("#" + id).closest('tr').remove();
            } else {
              alert('Failed');
              return;
            }
          }
        });
      } else {
        return null;
      }
    })
  </script>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="updateUser">
            <input type="hidden" name="id" id="id" value="">
            <input type="hidden" name="trid" id="trid" value="">
              <div class="d-flex gap-5 ms-2 me-2">
                <div class="mb-3 row">
                  <label for="codeField" class="col-md-3 form-label">Code</label>
                  <select class="form-select" id="codeField" name="code" aria-label="Default select example">
                    <option >--select code--</option>
                    <option value="Batch 29">Batch 29</option>
                    <option value="Batch 31">Batch 31</option>
                    <option value="Batch 40">Batch 40</option>
                  </select>
                </div>
                <div class="mb-3 row">
                  <label for="articleField" class="col-md-3 form-label">Article</label>
                  <select class="form-select" id="articleField" name="article" aria-label="Default select example">
                    <option>--select article--</option>
                    <option value="equipments">equipments</option>
                    <option value="package">package</option>
                    <option value="package/equipment">package/equipment</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="descriptionField" class="col-md-3 form-label">description</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" id="descriptionField" name="description">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="dateField" class="col-md-3 form-label">Date acquired</label>
                <div class="col-md-9">
                  <input type="date" class="form-control" id="dateField" name="date">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="unitValueField" class="col-md-3 form-label">Unit Value</label>
                <div class="col-md-9">
                  <input type="number" class="form-control" id="unitValueField" name="unitValue">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="totalValueField" class="col-md-3 form-label">Total Value</label>
                <div class="col-md-9">
                  <input type="number" class="form-control" id="totalValueField" name="totalValue">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="sourceOfFundField" class="col-md-3 form-label">Source of Fund</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" id="sourceOfFundField" name="sourceOfFund">
                </div>
              </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Add user Modal -->
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addUser" action="">
              <div class="d-flex gap-5 ms-2 me-2">
                <div class="mb-3 row">
                  <label for="addCodeField" class="col-md-3 form-label">Code</label>
                  <select class="form-select" id="addCodeField" name="code" aria-label="Default select example">
                    <option disable>--select code--</option>
                    <option value="Batch 29">Batch 29</option>
                    <option value="Batch 31">Batch 31</option>
                    <option value="Batch 40">Batch 40</option>
                  </select>
                </div>
                <div class="mb-3 row">
                  <label for="addArticleField" class="col-md-3 form-label">Article</label>
                  <select class="form-select" id="addArticleField" name="article" aria-label="Default select example">
                    <option disable>--select article--</option>
                    <option value="equipments">equipments</option>
                    <option value="package">package</option>
                    <option value="package/equipment">package/equipment</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="addDescriptionField" class="col-md-3 form-label">description</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" id="addDescriptionField" name="description">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="addDateField" class="col-md-3 form-label">Date acquired</label>
                <div class="col-md-9">
                  <input type="date" class="form-control" id="addDateField" name="date">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="addUnitValueField" class="col-md-3 form-label">Unit Value</label>
                <div class="col-md-9">
                  <input type="number" class="form-control" id="addUnitValueField" name="unitValue">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="addTotalValueField" class="col-md-3 form-label">Total Value</label>
                <div class="col-md-9">
                  <input type="number" class="form-control" id="addTotalValueField" name="totalValue">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="addSourceOfFundField" class="col-md-3 form-label">Source of Fund</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" id="addSourceOfFundField" name="sourceOfFund">
                </div>
              </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div id="test"></div>
  <?php require "footer.php" ?>

  <script src="js/dashboard.js"></script>
</body>
</html>
<script type="text/javascript">
  //var table = $('#example').DataTable();
</script>