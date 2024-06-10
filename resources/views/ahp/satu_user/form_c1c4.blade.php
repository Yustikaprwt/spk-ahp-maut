{{-- FASILITAS & LINGKUNGAN (C1-C4) --}}

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
                id="slider3" 
                name="C1-C4"
                min="1" 
                max="17" 
                step="1" 
                value="9" 
                oninput="updateValue3(this.value)">
            <span class="value-label" id="sliderValue3">1</span>
            <div class="slider-tooltip" id="sliderTooltip3">1</div>

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
    <label>Lingkungan & Keamanan Indekos</label>
</div>

<script>
const slider3 = document.getElementById('slider3');
const sliderValue3 = document.getElementById('sliderValue3');
const sliderTooltip3 = document.getElementById('sliderTooltip3');

function updateValue3(value) {
    const snappedValue = values[value - 1];
    sliderValue3.innerText = snappedValue;
    slider3.setAttribute('data-snapped-value', snappedValue);
    sliderTooltip3.innerText = snappedValue;
    console.log(`User input 2 : ${snappedValue}`);
}

slider3.addEventListener('input', (event) => {
    const value = parseInt(event.target.value);
    updateValue3(value);
});

updateValue3(slider3.value);
</script>