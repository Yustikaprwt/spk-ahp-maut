{{-- INVENTARIS KAMAR & FASILITAS KAMAR (C1A-C1C) --}}

<div class="input-group">
    <label>Inventaris Kamar</label>
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
                id="slider12" 
                name="C1A-C1C"
                min="1" 
                max="17" 
                step="1" 
                value="9" 
                oninput="updateValue12(this.value)">
            <span class="value-label" id="sliderValue12">1</span>
            <div class="slider-tooltip" id="sliderTooltip12">1</div>

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
    <label>Fasilitas Kamar</label>
</div>

<script>
const slider12 = document.getElementById('slider12');
const sliderValue12 = document.getElementById('sliderValue12');
const sliderTooltip12 = document.getElementById('sliderTooltip12');

function updateValue12(value) {
    const snappedValue = values[value - 1];
    sliderValue12.innerText = snappedValue;
    slider12.setAttribute('data-snapped-value', snappedValue);
    sliderTooltip12.innerText = snappedValue;
    console.log(`User input 11 : ${snappedValue}`);
}

slider12.addEventListener('input', (event) => {
    const value = parseInt(event.target.value);
    updateValue12(value);
});

updateValue12(slider12.value);
</script>


