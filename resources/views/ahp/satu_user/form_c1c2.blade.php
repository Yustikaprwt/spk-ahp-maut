{{-- FASILITAS & HARGA (C1-C2) --}}

<div class="input-group">
    <label>Fasilitas Indekos</label>
        <div class="slider-container">
            <span class="slider-mark mark-9"></span>
            <span class="slider-mark mark-8"></span>
            <span class="slider-mark mark-7"></span>
            <span class="slider-mark mark-6"></span>
            <span class="slider-mark mark-5"></span>
            <span class="slider-mark mark-4"></span>
            <span class="slider-mark mark-3"></span>
            <span class="slider-mark mark-2"></span>
            <span class="slider-mark mark-1"></span>
            <span class="slider-mark mark-0_50"></span>
            <span class="slider-mark mark-0_33"></span>
            <span class="slider-mark mark-0_25"></span>
            <span class="slider-mark mark-0_20"></span>
            <span class="slider-mark mark-0_16"></span>
            <span class="slider-mark mark-0_14"></span>
            <span class="slider-mark mark-0_12"></span>
            <span class="slider-mark mark-0_11"></span>
    
            <input 
                type="range" 
                id="slider1" 
                name="C1-C2"
                min="1" 
                max="17" 
                step="1" 
                value="9" 
                oninput="updateValue1(this.value)">
            <span class="value-label" id="sliderValue1">1</span>
            <div class="slider-tooltip" id="sliderTooltip1">1</div>

            <span class="slider-label mark-9">9</span>
            <span class="slider-label mark-8">8</span>
            <span class="slider-label mark-7">7</span>
            <span class="slider-label mark-6">6</span>
            <span class="slider-label mark-5">5</span>
            <span class="slider-label mark-4">4</span>
            <span class="slider-label mark-3">3</span>
            <span class="slider-label mark-2">2</span>
            <span class="slider-label mark-1">1</span>
            <span class="slider-label mark-0_50">2</span>
            <span class="slider-label mark-0_33">3</span>
            <span class="slider-label mark-0_25">4</span>
            <span class="slider-label mark-0_20">5</span>
            <span class="slider-label mark-0_16">6</span>
            <span class="slider-label mark-0_14">7</span>
            <span class="slider-label mark-0_12">8</span>
            <span class="slider-label mark-0_11">9</span>
        </div>
    <label>Harga Sewa Indekos</label>
</div>

<script>
    const slider1 = document.getElementById('slider1');
    const sliderValue1 = document.getElementById('sliderValue1');
    const sliderTooltip1 = document.getElementById('sliderTooltip1');
    const values = [9, 8, 7, 6, 5, 4, 3, 2, 1, 0.50, 0.33, 0.25, 0.20, 0.16, 0.14, 0.12, 0.11];

    function updateValue1(value) {
        const snappedValue = values[value - 1];
        sliderValue1.innerText = snappedValue;
        slider1.setAttribute('data-snapped-value', snappedValue);
        sliderTooltip1.innerText = snappedValue;
        console.log(`User input : ${snappedValue}`);
    }

    slider1.addEventListener('input', (event) => {
        const value = parseInt(event.target.value);
        updateValue1(value);
    });

    updateValue1(slider1.value);
</script>
