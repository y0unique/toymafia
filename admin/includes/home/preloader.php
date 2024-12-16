
<body>
        <div class="spinner-wrapper">

            <div class="image" >
                <img class="imagePreloader"  src="admin/images/logo/DepEd_logo_small.png" alt="depedManilaIcon">
            </div>
            <div class="spinner-border text-primary" role="status"></div>
        </div>
</body>
</html>
<style>
    .spinner-wrapper{
        background-color: #fff;
        position: fixed; 
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index : 9999;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: all 0.2s ease-in-out;
    }
    .spinner-border{
        width: 101px;
        height: 101px;
        position: absolute;
    }
    .imagePreloader{
        width: 100px;
        height: 100px;
        position: absolute;
        
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }
</style>

<script>
    const spinnerWrapperEl = document.querySelector(".spinner-wrapper");
 
    setTimeout(() => {
        spinnerWrapperEl.style.opacity = 0;
    }, 1000);

    window.addEventListener("load", function(){
        spinnerWrapperEl.style.opacity = 0;
        setTimeout(() => {
            spinnerWrapperEl.style.display = "none";
        }, 200);
    })
</script>
