<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carbon</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    
  </head>
  <body>
    <div
      class="d-flex justify-content-center align-items-center"
      style="
        height: 50dvh;
        background-image: linear-gradient(
            rgba(4, 9, 30, 0.3),
            rgba(4, 9, 30, 0.3)
          ),
          url(/img/event/event-bg.jpg);
        background-size: cover;
        background-position: center;
      "
    >
      <h1 class="display-1 text-white text-center pt-5 pb-3">
        Upcoming Events
      </h1>
    </div>

    <!-- search bar -->
    <div class="border d-flex justify-content-center">
      <form action="" class="d-flex gap-3 p-5 w-50">
        <div class="input-group">
          <span class="input-group-text" id="basic-addon1"
            ><i class="bi bi-search"></i
          ></span>
          <input
            type="email"
            class="form-control"
            id="searchForEvents"
            placeholder="Search for events"
          />
        </div>
        <button type="submit" class="btn btn-outline-success">Find</button>
      </form>
    </div>

    <!-- list -->
    <div class="p-5 border w-100 h-100 d-flex flex-column gap-5">
        <?php include 'event.php'; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
