<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex,nofollow" />
    <meta http-equiv="Cache-Control" content="max-age=86400" />
    <meta http-equiv="Cache-Control" content="max-age=86400" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="<?= base_url('assets/img/xyz.png') ?>" />
    <link rel="apple-touch-icon" href="<?= base_url('assets/img/xyz.png') ?>" />
    <title><?= $this->config->item('app_name'); ?></title>

    <?php require_once(LAYOUT_PATH . 'topnav' . DIRECTORY_SEPARATOR . 'head.php'); ?>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <?php require_once(LAYOUT_PATH . 'topnav' . DIRECTORY_SEPARATOR . 'header-nav.php'); ?>

        <div class="content-wrapper">
            <?php if (isset($view)): $this->load->view($view); endif; ?>
        </div>
        <div id="simple-toast" class="simple-toast hidden"></div>

        <?php require_once(LAYOUT_PATH . 'topnav' . DIRECTORY_SEPARATOR . 'footer.php'); ?>
        <button id="installButton" style="display: none;">Install App</button>
    </div>

    <script type="text/javascript">
        function showToast(message, timeout = 3000) {
            const toast = document.getElementById("simple-toast");

            // If toast is already visible, destroy it first
            if (toast.classList.contains("visible")) {
                toast.classList.remove("visible");
                toast.classList.add("hidden");
            }

            toast.innerText = message;
            toast.classList.remove("hidden");
            toast.classList.add("visible");

            setTimeout(() => {
                toast.classList.remove("visible");
                toast.classList.add("hidden");
            }, timeout);
        }

        function fetchWithTimeout(url, options = {}, timeout = 5000) {
            const headers = {
                ...options.headers,
            };

            const updatedOptions = {
                ...options,
                headers,
                mode: "cors",
            };

            const timeoutPromise = new Promise((_, reject) => {
                setTimeout(() => reject(new Error("Request timed out")), timeout);
            });

            return Promise.race([fetch(url, updatedOptions), timeoutPromise]);
        }

        async function fetchWithRetry(
            url,
            options = {},
            retries = 3,
            delay = 1000,
            timeout = 5000
        ) {
            for (let i = 1; i <= retries; i++) {
                try {
                    const response = await fetchWithTimeout(url, options, timeout);
                    // if (!response.ok) {
                    //   throw new Error(`HTTP error! status: ${response.status}`);
                    // }

                    if (!response.ok) {
                        const errorData = await response.json();
                        throw new Error(JSON.stringify(errorData));
                    }

                    return await response.json();
                } catch (error) {
                    const errorData = JSON.parse(error.message);
                    if (i < retries) {
                        await new Promise((res) => setTimeout(res, delay));
                    } else if (i === retries) {
                        showToast(errorData.message);
                        return {
                            message: errorData.message,
                            statusCode: errorData.statusCode
                        };
                    } else {
                        // console.log(`Failed after ${retries} attempts: ${error.message}`);
                        throw new Error(`Failed after ${retries} attempts: ${error.message}`);
                    }
                }
            }
        }
    </script>
    <?php if (isset($js) && count($js) > 0) :
        foreach ((array) $js as $j) :
            require_once(SCRIPT_PATH . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $j));
        endforeach;
    endif; ?>
</body>

</html>