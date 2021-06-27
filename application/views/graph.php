<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?= $judul ?></h1>
          <!-- <input type="email" name="em" id="em" value="<?= $this->session->userdata('email'); ?>"> -->
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('classified') ?>">Kelas Klasifikasi</a></li>
            <li class="breadcrumb-item active"><?= $judul ?></li>
          </ol>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <!-- <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div> -->
  </div>

  <section class="content">
    <div class="row card shadow justify-content-center">
      <div class="col-lg-12 text-center p-2">
        <div class="card-header bg-purple">
          <h1>Hasil Klasifikasi (Graph Linear)</h1>
        </div>
        <div class="card-body">
          <canvas id="NPGcanvas" width="500" height="500" class="rounded text-center">Browser not supported for Canvas. Get a real browser.</canvas><br /><br />
        </div>
        <div class="card-footer"></div>
        <!-- <div id="dec"> -->
        <!-- <br /> -->
        <!-- <p>
          Uses SMO algorithm. Find code on <a href="https://github.com/karpathy/svmjs">Github</a> <br />
          Find me on Twitter <a href="https://twitter.com/karpathy">@karpathy</a>
        </p> -->
        <!-- </div> -->

      </div>
    </div>



    <!-- <p>
    <b>mouse click</b>: add red data point<br />
    <b>shift + mouse click</b>: add green data point<br />
    <b>'k'</b>: toggle between Linear and Rbf kernel<br />
    <b>'r'</b>: reset<br />
  </p> -->


    <!-- <div id="optsdiv">
    <div style="width:230px; float: left; margin-left: 10px;">
      <div id="slider1"></div><br /><span id="creport">C = 1.0</span>
    </div>
    <div style="width:230px; float: right; margin-right: 10px;">
      <div id="slider2"></div><br /><span id="sigreport">RBF Kernel sigma = 1.0</span>
    </div>
  </div> -->


    <script type="text/javascript" src="<?= base_url() ?>assets/dist/js/jqueryui/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/dist/js/jqueryui/jquery-ui-1.8.21.custom.min.js"></script>
    <script src="<?= base_url() ?>assets/dist/js/npg_include/npgmain.js"></script>
    <script src="<?= base_url() ?>assets/dist/js/lib/svm.js"></script>
    <script type="text/javascript">
      /*
This demo includes npg library (notpygamejs) that I wrote a while ago. It can
be found on my Github page (https://github.com/karpathy/notpygamejs). It's a 
quick and dirty canvas wrapper that has some helped functions I use often.
It's main use is to contain a main loop and expose methods update(), draw(), 
as well as some events keyUp(), mouseClick() etc.
*/


      var N = 10; //number of data points
      var data = new Array(N);
      var labels = new Array(N);
      var wb; // weights and offset structure
      var ss = 50.0; // scaling factor for drawing
      var svm = new svmjs.SVM();
      var trainstats;
      var dirty = true;
      var kernelid = 0;
      var rbfKernelSigma = 0.5;
      var svmC = 1.0;

      function myinit() {

        data[0] = [-0.4326, 1.1909];
        data[1] = [3.0, 4.0];
        data[2] = [0.1253, -0.0376];
        data[3] = [0.2877, 0.3273];
        data[4] = [-1.1465, 0.1746];
        data[5] = [1.8133, 2.1139];
        data[6] = [2.7258, 3.0668];
        data[7] = [1.4117, 2.0593];
        data[8] = [4.1832, 1.9044];
        data[9] = [1.8636, 1.1677];

        // Manalagi
        // data[0] = [57.02777778, 0.67015];
        // data[1] = [57, 0.685277778];
        // data[2] = [60.27777778, 0.877358333];
        // data[3] = [42.11111111, 0.981877778];
        // data[4] = [59.91666667, 0.656138889];
        // data[5] = [62.11111111, 0.895002778];
        // data[6] = [52.19444444, 0.892163889];
        // data[7] = [60.97222222, 0.662755556];
        // data[8] = [64.16666667, 0.781552778];
        // data[9] = [51.47222222, 0.962397222];
        // data[10] = [61.27777778, 0.827236111];
        // data[11] = [67.77777778, 0.701013889];
        // data[12] = [52.63888889, 0.945491667];
        // data[13] = [62.05555556, 0.811691667];
        // data[14] = [58.69444444, 0.931016667];
        // data[15] = [54.69444444, 0.890275];
        // data[16] = [58.38888889, 0.872819444];
        // data[17] = [57.97222222, 0.919183333];
        // data[18] = [48.5, 0.944597222];
        // data[19] = [61.86111111, 0.688363889];
        // data[20] = [62.94444444, 0.640888889];
        // data[21] = [56.55555556, 0.80195];
        // data[22] = [60.5, 0.736669444];
        // data[23] = [63.88888889, 0.559413889];
        // data[24] = [58.69444444, 0.674686111];
        // data[25] = [62.44444444, 0.779347222];
        // data[26] = [63.83333333, 0.617169444];
        // data[27] = [48.97222222, 0.901402778];
        // data[28] = [60.91666667, 0.832072222];
        // data[29] = [62.91666667, 0.697444444];
        // data[30] = [51.66666667, 0.932219444];
        // data[31] = [62.69444444, 0.863666667];
        // data[32] = [58.61111111, 0.807797222];
        // data[33] = [46.05555556, 0.952805556];
        // data[34] = [59.75, 0.871922222];
        // data[35] = [59.66666667, 0.954275];
        // data[36] = [54.05555556, 0.974838889];
        // data[37] = [59.91666667, 0.837386111];
        // data[38] = [62.22222222, 0.630302778];
        // data[39] = [54.33333333, 0.661555556];

        // Green Smith
        // data[40] = [67, 0.661783333];
        // data[41] = [60.91666667, 0.891161111];
        // data[42] = [67.66666667, 0.647302778];
        // data[43] = [64.36111111, 0.645613889];
        // data[44] = [65.02777778, 0.784088889];
        // data[45] = [59.5, 0.980525];
        // data[46] = [62.41666667, 0.806441667];
        // data[47] = [63.05555556, 0.8389];
        // data[48] = [64.63888889, 0.853302778];
        // data[49] = [62.36111111, 0.890236111];
        // data[50] = [61.83333333, 0.882563889];
        // data[51] = [64.16666667, 0.773691667];
        // data[52] = [61.22222222, 0.920841667];
        // data[53] = [63.11111111, 0.902761111];
        // data[54] = [63.83333333, 0.879294444];
        // data[55] = [61.72222222, 0.810255556];
        // data[56] = [64.38888889, 0.872716667];
        // data[57] = [65.30555556, 0.755883333];
        // data[58] = [61.72222222, 0.831655556];
        // data[59] = [63.55555556, 0.865405556];
        // data[60] = [62.55555556, 0.764327778];
        // data[61] = [62.02777778, 0.864902778];
        // data[62] = [64.55555556, 0.846655556];
        // data[63] = [62.30555556, 0.886408333];
        // data[64] = [62.30555556, 0.904502778];
        // data[65] = [62.13888889, 0.804402778];
        // data[66] = [63.69444444, 0.758747222];
        // data[67] = [60.11111111, 0.775438889];
        // data[68] = [63.80555556, 0.577313889];
        // data[69] = [60.44444444, 0.901561111];
        // data[70] = [58.41666667, 0.8974];
        // data[71] = [66.16666667, 0.90755];
        // data[72] = [61.47222222, 0.907125];
        // data[73] = [56.72222222, 0.913463889];
        // data[74] = [63.16666667, 0.792608333];
        // data[75] = [56.86111111, 0.930694444];
        // data[76] = [61.22222222, 0.903888889];
        // data[77] = [62.75, 0.888038889];
        // data[78] = [60.83333333, 0.847702778];
        // data[79] = [59.19444444, 0.754502778];

        labels[0] = 1;
        labels[1] = 1;
        labels[2] = 1;
        labels[3] = 1;
        labels[4] = 1;
        labels[5] = -1;
        labels[6] = -1;
        labels[7] = -1;
        labels[8] = -1;
        labels[9] = -1;
        // labels[0] = -1;
        // labels[1] = -1;
        // labels[2] = -1;
        // labels[3] = -1;
        // labels[4] = -1;
        // labels[5] = -1;
        // labels[6] = -1;
        // labels[7] = -1;
        // labels[8] = -1;
        // labels[9] = -1;
        // labels[10] = -1;
        // labels[11] = -1;
        // labels[12] = -1;
        // labels[13] = -1;
        // labels[14] = -1;
        // labels[15] = -1;
        // labels[16] = -1;
        // labels[17] = -1;
        // labels[18] = -1;
        // labels[19] = -1;
        // labels[20] = -1;
        // labels[21] = -1;
        // labels[22] = -1;
        // labels[23] = -1;
        // labels[24] = -1;
        // labels[25] = -1;
        // labels[26] = -1;
        // labels[27] = -1;
        // labels[28] = -1;
        // labels[29] = -1;
        // labels[30] = -1;
        // labels[31] = -1;
        // labels[32] = -1;
        // labels[33] = -1;
        // labels[34] = -1;
        // labels[35] = -1;
        // labels[36] = -1;
        // labels[37] = -1;
        // labels[38] = -1;
        // labels[39] = -1;

        // labels[40] = 1;
        // labels[41] = 1;
        // labels[42] = 1;
        // labels[43] = 1;
        // labels[44] = 1;
        // labels[45] = 1;
        // labels[46] = 1;
        // labels[47] = 1;
        // labels[48] = 1;
        // labels[49] = 1;
        // labels[50] = 1;
        // labels[51] = 1;
        // labels[52] = 1;
        // labels[53] = 1;
        // labels[54] = 1;
        // labels[55] = 1;
        // labels[56] = 1;
        // labels[57] = 1;
        // labels[58] = 1;
        // labels[59] = 1;
        // labels[60] = 1;
        // labels[61] = 1;
        // labels[62] = 1;
        // labels[63] = 1;
        // labels[64] = 1;
        // labels[65] = 1;
        // labels[66] = 1;
        // labels[67] = 1;
        // labels[68] = 1;
        // labels[69] = 1;
        // labels[70] = 1;
        // labels[71] = 1;
        // labels[72] = 1;
        // labels[73] = 1;
        // labels[74] = 1;
        // labels[75] = 1;
        // labels[76] = 1;
        // labels[77] = 1;
        // labels[79] = 1;
        // labels[78] = 1;

        retrainSVM();
      }

      function retrainSVM() {

        if (kernelid === 1) {
          trainstats = svm.train(data, labels, {
            kernel: 'rbf',
            rbfsigma: rbfKernelSigma,
            C: svmC
          });
        }
        if (kernelid === 0) {
          trainstats = svm.train(data, labels, {
            kernel: 'linear',
            C: svmC
          });
          wb = svm.getWeights();
        }

        dirty = true; // to redraw screen
      }

      function update() {}

      function draw() {
        if (!dirty) return;

        ctx.clearRect(0, 0, WIDTH, HEIGHT);

        // draw decisions in the grid
        var density = 4.0;
        for (var x = 0.0; x <= WIDTH; x += density) {
          for (var y = 0.0; y <= HEIGHT; y += density) {
            var dec = svm.marginOne([(x - WIDTH / 2) / ss, (y - HEIGHT / 2) / ss]);
            if (dec > 0) ctx.fillStyle = 'rgb(150,250,150)';
            else ctx.fillStyle = 'rgb(250,150,150)';
            ctx.fillRect(x - density / 2 - 1, y - density - 1, density + 2, density + 2);
          }
        }

        // draw axes
        ctx.beginPath();
        ctx.strokeStyle = 'rgb(50,50,50)';
        ctx.lineWidth = 1;
        ctx.moveTo(0, HEIGHT / 2);
        ctx.lineTo(WIDTH, HEIGHT / 2);
        ctx.moveTo(WIDTH / 2, 0);
        ctx.lineTo(WIDTH / 2, HEIGHT);
        ctx.stroke();

        // draw datapoints. Draw support vectors larger
        ctx.strokeStyle = 'rgb(0,0,0)';
        for (var i = 0; i < N; i++) {

          if (labels[i] == 1) ctx.fillStyle = 'rgb(100,200,100)';
          else ctx.fillStyle = 'rgb(200,100,100)';

          if (svm.alpha[i] > 1e-2) ctx.lineWidth = 3; // distinguish support vectors
          else ctx.lineWidth = 1;

          drawCircle(data[i][0] * ss + WIDTH / 2, data[i][1] * ss + HEIGHT / 2, Math.floor(3 + svm.alpha[i] * 5.0 / svmC));
        }

        // if linear kernel, draw decision boundary and margin lines
        if (kernelid == 0) {

          var xs = [-5, 5];
          var ys = [0, 0];
          ys[0] = (-wb.b - wb.w[0] * xs[0]) / wb.w[1];
          ys[1] = (-wb.b - wb.w[0] * xs[1]) / wb.w[1];
          ctx.fillStyle = 'rgb(0,0,0)';
          ctx.lineWidth = 1;
          ctx.beginPath();
          // wx+b=0 line
          ctx.moveTo(xs[0] * ss + WIDTH / 2, ys[0] * ss + HEIGHT / 2);
          ctx.lineTo(xs[1] * ss + WIDTH / 2, ys[1] * ss + HEIGHT / 2);
          // wx+b=1 line
          ctx.moveTo(xs[0] * ss + WIDTH / 2, (ys[0] - 1.0 / wb.w[1]) * ss + HEIGHT / 2);
          ctx.lineTo(xs[1] * ss + WIDTH / 2, (ys[1] - 1.0 / wb.w[1]) * ss + HEIGHT / 2);
          // wx+b=-1 line
          ctx.moveTo(xs[0] * ss + WIDTH / 2, (ys[0] + 1.0 / wb.w[1]) * ss + HEIGHT / 2);
          ctx.lineTo(xs[1] * ss + WIDTH / 2, (ys[1] + 1.0 / wb.w[1]) * ss + HEIGHT / 2);
          ctx.stroke();

          // draw margin lines for support vectors. The sum of the lengths of these
          // lines, scaled by C is essentially the total hinge loss.
          for (var i = 0; i < N; i++) {
            if (svm.alpha[i] < 1e-2) continue;
            if (labels[i] == 1) {
              ys[0] = (1 - wb.b - wb.w[0] * xs[0]) / wb.w[1];
              ys[1] = (1 - wb.b - wb.w[0] * xs[1]) / wb.w[1];
            } else {
              ys[0] = (-1 - wb.b - wb.w[0] * xs[0]) / wb.w[1];
              ys[1] = (-1 - wb.b - wb.w[0] * xs[1]) / wb.w[1];
            }
            var u = (data[i][0] - xs[0]) * (xs[1] - xs[0]) + (data[i][1] - ys[0]) * (ys[1] - ys[0]);
            u = u / ((xs[0] - xs[1]) * (xs[0] - xs[1]) + (ys[0] - ys[1]) * (ys[0] - ys[1]));
            var xi = xs[0] + u * (xs[1] - xs[0]);
            var yi = ys[0] + u * (ys[1] - ys[0]);
            ctx.moveTo(data[i][0] * ss + WIDTH / 2, data[i][1] * ss + HEIGHT / 2);
            ctx.lineTo(xi * ss + WIDTH / 2, yi * ss + HEIGHT / 2);
          }
          ctx.stroke();
        }

        ctx.fillStyle = 'rgb(0,0,0)';
        ctx.fillText("Terkumpul dalam " + trainstats.iters + " iterasi.", 10, HEIGHT - 30);
        var numsupp = 0;
        for (var i = 0; i < N; i++) {
          if (svm.alpha[i] > 1e-5) numsupp++;
        }
        ctx.fillText("Jumlah dari support vectors: " + numsupp + " / " + N, 10, HEIGHT - 50);

        // if (kernelid === 1) ctx.fillText("Using Rbf kernel with sigma = " + rbfKernelSigma.toPrecision(2), 10, HEIGHT - 70);
        if (kernelid === 0) ctx.fillText("Menggunakan (Linear kernel)", 10, HEIGHT - 70);

        // ctx.fillText("N = " + N, 10, HEIGHT - 110);

        ctx.fillText("C = " + svmC.toPrecision(2) + ", N = " + N, 10, HEIGHT - 90);
      }

      // function mouseClick(x, y, shiftPressed) {

      //   // add datapoint at location of click
      //   data[N] = [(x - WIDTH / 2) / ss, (y - HEIGHT / 2) / ss];
      //   labels[N] = shiftPressed ? 1 : -1;
      //   N += 1;

      //   // retrain the svm
      //   retrainSVM();
      // }

      function keyUp(key) {

        if (key == 82) { // 'r'

          // reset to original data and retrain
          data = data.splice(0, 10);
          labels = labels.splice(0, 10);
          N = 10;
          retrainSVM();
        }
        if (key == 75) { // 'k'

          // toggle between kernels: rbf or linear
          kernelid = 1 - kernelid; // toggle 1 and 0
          retrainSVM();
        }
      }

      function keyDown(key) {}


      // UI stuff
      function refreshC(event, ui) {
        var logC = ui.value;
        svmC = Math.pow(10, logC);
        $("#creport").text("C = " + svmC.toPrecision(2));
        retrainSVM();
      }

      function refreshSig(event, ui) {
        var logSig = ui.value;
        rbfKernelSigma = Math.pow(10, logSig);
        $("#sigreport").text("RBF Kernel sigma = " + rbfKernelSigma.toPrecision(2));
        if (kernelid == 1) {
          retrainSVM();
        }
      }

      $(function() {
        // for C parameter
        $("#slider1").slider({
          orientation: "horizontal",
          slide: refreshC,
          max: 2.0,
          min: -2.0,
          step: 0.1,
          value: 0.0
        });

        // for rbf kernel sigma
        $("#slider2").slider({
          orientation: "horizontal",
          slide: refreshSig,
          max: 2.0,
          min: -2.0,
          step: 0.1,
          value: 0.0
        });
      });
    </script>
  </section>
</div>