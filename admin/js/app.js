// add new course units 1:1
addingAndEditing(
  "#addYearOneSemOne",
  "add_course_unit",
  "Successfully added new course unit",
  "Failed to add new course unit"
);
// add new course units 1:2
addingAndEditing(
  "#addYearOneSemTwo",
  "add_course_unit",
  "Successfully added new course unit",
  "Failed to add new course unit"
);
// add new course units 2:1
addingAndEditing(
  "#addYearTwoSemOne",
  "add_course_unit",
  "Successfully added new course unit",
  "Failed to add new course unit"
);
// add new course units 2:2
addingAndEditing(
  "#addYearTwoSemTwo",
  "add_course_unit",
  "Successfully added new course unit",
  "Failed to add new course unit"
);
// add new course units 3:1
addingAndEditing(
  "#addYearThreeSemOne",
  "add_course_unit",
  "Successfully added new course unit",
  "Failed to add new course unit"
);
// add new course units 3:2
addingAndEditing(
  "#addYearThreeSemTwo",
  "add_course_unit",
  "Successfully added new course unit",
  "Failed to add new course unit"
);
// add new course
addingAndEditing(
  "#addNewCourse",
  "add_course",
  "Successfully added new course ",
  "Failed to add new course"
);
// add new user
addingAndEditing(
  "#addNewUser",
  "add_user",
  "Successfully added new user ",
  "Failed to add new user"
);

// updating
// course units
addingAndEditing(
  "#update_course_unit",
  "update_course_unit",
  "Successfully updated course unit",
  "Failed to update course unit"
);
// course
addingAndEditing(
  "#update_lecturer",
  "update_lecturer",
  "Successfully updated lecturer details",
  "Failed to update lecturer details"
);
// lecturers
addingAndEditing(
  "#update_course",
  "update_course_details",
  "Successfully updated course details",
  "Failed to update course details"
);
// user
addingAndEditing(
  "#update_user",
  "update_user",
  "Successfully updated user details",
  "Failed to update user details"
);
// admin
addingAndEditing(
  "#update_admin",
  "update_admin",
  "Successfully updated admin details",
  "Failed to update admin details"
);

//course unit
$(".editing").on("click", function () {
  const id = $(this).data("id");
  // console.log(id);
  const data = new FormData();
  data.append("id", id);
  display_edit_form("draw_course_unit_edit_form", data);
});
//course
$(".course").on("click", function () {
  const id = $(this).data("id");
  // console.log(id);
  const data = new FormData();
  data.append("id", id);
  display_edit_form("draw_course_edit_form", data);
});
//lecturer
$(".lecturer").on("click", function () {
  const id = $(this).data("id");
  // console.log(id);
  const data = new FormData();
  data.append("id", id);
  display_edit_form("draw_lecturer_edit_form", data);
});
//lecturer
$(".user").on("click", function () {
  const id = $(this).data("id");
  const data = new FormData();
  data.append("id", id);
  display_edit_form("draw_user_edit_form", data);
});
// add new lecturer
addingAndEditing(
  "#addNewLecturer",
  "add_lecturer",
  "Successfully added new Lecturer",
  "Failed to add new Lecturer"
);
// add new system user
addingAndEditing(
  "#addNewUser",
  "add_user",
  "Successfully added new User",
  "Failed to add new User"
);

// course units
$(".units").on("click", function () {
  const id = $(this).data("id");
  const data = new FormData();
  data.append("id", id);
  $(".yes").on("click", function () {
    delete_item("delete_course_unit", data);
  });
});
// course
$(".course").on("click", function () {
  const id = $(this).data("id");
  const data = new FormData();
  data.append("id", id);
  $(".yes").on("click", function () {
    delete_item("delete_course", data);
  });
});
// user
$(".users").on("click", function () {
  const id = $(this).data("id");
  const data = new FormData();
  data.append("id", id);
  $(".yes").on("click", function () {
    delete_item("delete_user", data);
  });
});
// lecturer
$(".lecturers").on("click", function () {
  const id = $(this).data("id");
  const data = new FormData();
  data.append("id", id);
  $(".yes").on("click", function () {
    delete_item("delete_lecturer", data);
  });
});

function addingAndEditing(elem, action, msg, error) {
  $(elem).on("submit", function (e) {
    e.preventDefault();
    $.ajax({
      url: "includes/ajax.php?role=" + action,
      data: new FormData($(this)[0]),
      cache: false,
      contentType: false,
      processData: false,
      method: "POST",
      type: "POST",
      error: (err) => {
        console.log(err);
      },
      success: function (response) {
        response = JSON.parse(response);
        if (response.response === "success") {
          createToast("Success", msg, "check", "success");
          toastInfo(true);
        } else {
          createToast("Failed", error, "close", "danger");
          toastInfo(false);
        }
      },
    });
  });
}

function createToast(header, text, i, bg) {
  return (document.querySelector(
    "body"
  ).innerHTML += `<div class="toast bg-${bg} my-toast">
                <div class="toast-header bg-${bg} text-white">
                   ${header}
                </div>
                <div class="toast-body text-white">
                   <i class="fas fa-${i}"></i> ${text}
                </div>
                </div>`);
}

function toastInfo(reload = false) {
  $(".toast").toast({ animation: true, delay: 2000 });

  setTimeout(function () {
    $("#myModal").modal("hide");
    $(".toast").toast("show");
  }, 1000);
  setTimeout(function () {
    // $(".toast").toast("dispose");
    if (reload) {
      window.location.reload();
    }
  });
}

function display_edit_form(role, data) {
  $.ajax({
    url: "includes/ajax.php?role=" + role,
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    method: "POST",
    type: "POST",
    error: (err) => {
      console.log("Error", err);
    },
    success: function (response) {
      $(".editing_form").html(response);
    },
  });
}

function delete_item(role, item) {
  $.ajax({
    url: "includes/ajax.php?role=" + role,
    data: item,
    cache: false,
    contentType: false,
    processData: false,
    method: "POST",
    type: "POST",
    error: (err) => {
      console.log("Error", err);
    },
    success: function (response) {
      response = JSON.parse(response);
      if (response.response == "success") {
        window.location.reload();
      }
    },
  });
}
