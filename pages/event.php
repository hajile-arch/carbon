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
        height: 100dvh;
        background-image: linear-gradient(
            rgba(4, 9, 30, 0.3),
            rgba(4, 9, 30, 0.3)
          ),
          url(../img/event/event-bg.jpg);
        background-size: cover;
        background-position: center;
      "
    >
      <h1 class="display-1 text-white text-center pt-5 pb-3">
        Upcoming Events
      </h1>
    </div>

    <div class="border d-flex justify-content-center align-items-center">
      <!-- search bar -->
      <form class="d-flex gap-3 p-5 w-50" onsubmit="search(event)">
        <div class="input-group">
          <span class="input-group-text" id="basic-addon1"
            ><i class="bi bi-search"></i
          ></span>
          <input
            type="text"
            class="form-control"
            id="searchForEvents"
            placeholder="Search for events"
          />
        </div>
      </form>
      <!--  filter button group -->
      <div class="dropdown">
        <button
          class="btn btn-outline-success dropdown-toggle"
          type="button"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          Filter
        </button>
        <ul class="dropdown-menu p-0" style="width: 200px">
          <div class="d-flex flex-column align-items-start">
            <button
              type="button"
              class="btn w-100 text-start"
              onclick="handleFilter(this)"
            >
              Environmental Cleanup
            </button>
            <button
              type="button"
              class="btn w-100 text-start"
              onclick="handleFilter(this)"
            >
              Community Service
            </button>
            <button
              type="button"
              class="btn w-100 text-start"
              onclick="handleFilter(this)"
            >
              Renewable Energy
            </button>
            <button
              type="button"
              class="btn w-100 text-start"
              onclick="handleFilter(this)"
            >
              Seminar
            </button>
            <button
              type="button"
              class="btn w-100 text-start"
              onclick="handleFilter(this)"
            >
              Gardening
            </button>
            <button
              type="button"
              class="btn w-100 text-start"
              onclick="handleFilter(this)"
            >
              Sustainability
            </button>
            <button
              type="button"
              class="btn w-100 text-start"
              onclick="handleFilter(this)"
            >
              Nature Exploration
            </button>
            <button
              type="button"
              class="btn w-100 text-start"
              onclick="handleFilter(this)"
            >
              Conservation
            </button>
            <button
              type="button"
              class="btn w-100 text-start"
              onclick="handleFilter(this)"
            >
              Waste Reduction
            </button>
          </div>
        </ul>
      </div>
    </div>
    <!-- list -->
    <div class="p-5 w-100 h-100 d-flex flex-column gap-5">
      <?php include '../api/event-lists.php'; ?>
    </div>
    <script src="../scripts/event.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
