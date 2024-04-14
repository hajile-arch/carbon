<?php
session_start();
?>
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
    <link rel="stylesheet" href="../styles.css" />
  </head>
  <body>
    <header
      class="d-flex justify-content-between position-fixed w-100 z-1 border bg-white"
      style="height: 70px"
    >

      <a
        href="home.php"
        class="d-flex justify-content-center align-items-center w-25 text-decoration-none"
        style="margin-left: 10px"
      >
        <div>
          <img
            src="../img/nav/logo.png"
            alt="logo"
            width="60px"
            height="60px"
            style="
              filter: invert(38%) sepia(53%) saturate(604%) hue-rotate(100deg)
                brightness(99%) contrast(91%);
            "
          />
        </div>
        <h4 class="dropdown-item text-black mb-0">Carbon</h4>
      </a>

      <nav class="d-flex gap-3 align-items-center justify-content-between">
        <a
          href="home.php"
          class="nav-link"
          onmouseover="this.style.color='#198754'"
          onmouseout="this.style.color='#000'"
          >Home</a
        >
        <a
          href="dashboard.php"
          class="nav-link"
          onmouseover="this.style.color='#198754'"
          onmouseout="this.style.color='#000'"
          >Dashboard</a
        >
        <a
          href="learn.html"
          target="_blank"
          class="nav-link"
          onmouseover="this.style.color='#198754'"
          onmouseout="this.style.color='#000'"
          >Learn</a
        >
      </nav>
      <div
        class="dropdown pe-3 d-flex justify-content-end align-items-center w-25"
      >
        <div class="btn-group border">
          <a
            href="profile.php"
            class="btn"
            onmouseover="this.style.backgroundColor = '#f8f9fa'"
            onmouseleave="this.style.backgroundColor = 'white'"
          >
            <i class="bi bi-person-fill"></i>
          </a>
          <button
            class="btn dropdown-toggle dropdown-toggle-split"
            type="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            onmouseover="this.style.backgroundColor = '#f8f9fa'"
            onmouseleave="this.style.backgroundColor = 'white'"
          ></button>
          <ul class="dropdown-menu mt-2">
            <a class="dropdown-item btn" href="event.php" target="_blank"
              >Event</a
            >
            <button
              type="button"
              class="dropdown-item btn"
              data-bs-toggle="modal"
              data-bs-target="#feedback"
            >
              Feedback
            </button>
            <a
              class="dropdown-item btn"
              onmouseover="this.style.backgroundColor = '#b23b3b'; this.style.color = 'white'"
              onmouseleave="this.style.backgroundColor = 'white'; this.style.color = 'black'"
              href="../index.html"
              >Sign out</a
            >
          </ul>
        </div>
      </div>
    </header>

    <!-- modal -->
    <div
      class="modal fade"
      id="feedback"
      tabindex="-1"
      aria-labelledby="feedbackLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="feedbackLabel">Feedback</h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
              onclick="clearFeedback()"
            ></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label"
                  >Subject:</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="feedback-subject"
                  oninput="feedbackValidation()"
                />
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label"
                  >Message:</label
                >
                <textarea
                  class="form-control"
                  id="feedback-message"
                  oninput="feedbackValidation()"
                ></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
              onclick="clearFeedback()"
            >
              Close
            </button>
            <button
              id="toast-btn"
              type="button"
              class="btn btn-success"
              data-bs-dismiss="modal"
              disabled
              onclick="clearFeedback(); showToast()"
            >
              Send feedback
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- toast -->
    <div
      id="toast"
      class="toast position-absolute bottom-0 end-0 m-3 z-1"
      role="alert"
      aria-live="assertive"
      aria-atomic="true"
    >
      <div class="d-flex">
        <div class="toast-body">Feedback submitted!</div>
        <button
          type="button"
          class="btn-close me-2 m-auto"
          data-bs-dismiss="toast"
          aria-label="Close"
          onclick="closeToast()"
        ></button>
      </div>
    </div>

    <!-- modal for share result -->
    <div
      class="modal fade"
      id="shareResult"
      tabindex="-1"
      aria-labelledby="shareResultLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="shareResultLabel">
              Share Your Environmental Impact
            </h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <p>Energy consumption: <span id="energyConsumptionSpan">0</span></p>
            <p>Transportation: <span id="transportationSpan">0</span></p>
            <p>Recycling habits: <span id="recyclingHabitsSpan">0</span></p>
            <p>
              Total Carbon Footprint:
              <span class="totalCarbonFootprintSpan">0</span>
            </p>
          </div>
          <div class="modal-footer">
            <div class="d-flex w-100 justify-content-center gap-4">
              <a
                href="https://www.instagram.com/"
                class="link-secondary"
                target="_blank"
                ><i class="bi bi-instagram"></i
              ></a>
              <a
                href="https://www.threads.net/"
                class="link-secondary"
                target="_blank"
                ><i class="bi bi-threads"></i
              ></a>
              <a
                href="https://www.facebook.com/"
                class="link-secondary"
                target="_blank"
                ><i class="bi bi-facebook"></i
              ></a>
              <a
                href="https://www.twitter.com/"
                class="link-secondary"
                target="_blank"
                ><i class="bi bi-twitter-x"></i
              ></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <main
      class="p-5 position-absolute w-100"
      style="margin-top: 70px; height: calc(100% - 70px)"
    >
      <div class="d-flex gap-3 h-100">
        <!-- left -->
        <div class="d-flex flex-column h-100 gap-3 w-50">
          <!-- top left -->
          <div
            class="border p-5 rounded d-flex flex-column justify-content-center align-items-center gap-3"
            style="height: 80%"
          >
            <h1 class="display-6 fs-6">Carbon Footprint for <span id="date"></span></h1>
            <div
              class="d-flex flex-column justify-content-center align-items-center w-100"
            >
              <p class="m-0">Carbon Footprint Distribution by Category</p>
              <canvas id="doughnut"></canvas>
            </div>
            <p class="m-0">
              Total Carbon Footprint:
              <span class="totalCarbonFootprintSpan">0</span>
            </p>
          </div>
          <!-- bottom left -->
          <div
            class="border rounded d-flex flex-column justify-content-center align-items-center px-5"
            style="height: 20%"
          >
            <h1 class="display-6 fs-6 pb-2">Share Your Environmental Impact</h1>
            <button
              type="button"
              class="btn btn-secondary w-100"
              data-bs-toggle="modal"
              data-bs-target="#shareResult"
            >
              Share
            </button>
          </div>
        </div>
        <!-- right -->
        <div class="d-flex flex-column w-100 h-100 gap-3">
          <!-- top right -->
          <div
            class="border p-5 h-75 w-100 rounded d-flex flex-column justify-content-center align-items-center"
          >
            <div
              class="w-100 d-flex justify-content-start align-items-center gap-4 ps-4"
            >
              <ul class="pagination m-0 d-flex gap-2">
                <li class="page-item">
                  <button class="page-link text-secondary prev">
                    <i class="bi bi-chevron-compact-left pe-none"></i>
                  </button>
                </li>
                <li class="page-item">
                  <button class="page-link text-secondary next">
                    <i class="bi bi-chevron-compact-right pe-none"></i>
                  </button>
                </li>
              </ul>
              <h1 class="display-6 fs-6 m-0">
                Carbon Footprint Analysis for <span id="selectedYear">0</span> by Month
              </h1>
            </div>
            <canvas id="bar-chart"></canvas>
          </div>
          <!-- bottom right -->
          <div
            class="border p-5 rounded h-50 d-flex flex-column justify-content-center align-items-center overflow-hidden"
          >
            <h3 class="display-6 fs-6">Recommendation</h3>
            <p id="recommendationText" style="font-size: small;"></p>
          </div>
        </div>
      </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../scripts/dashboard.js? v= <?php echo time(); ?>"></script>
    <script src="../scripts/feedback.js? v=<?php echo time(); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
