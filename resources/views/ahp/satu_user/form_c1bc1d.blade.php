{{-- INVENTARIS BARANG INDEKOS & FASILITAS PENDUKUNG (C1B-C1D) --}}

<div class="input-group">
    <label>Inventaris Barang Indekos</label>
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
                id="slider15" 
                name="C1B-C1D"
                min="1" 
                max="17" 
                step="1" 
                value="9" 
                oninput="updateValue15(this.value)">
            <span class="value-label" id="sliderValue15">1</span>
            <div class="slider-tooltip" id="sliderTooltip15">1</div>

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
    <label>Fasilitas Pendukung</label>
</div>

<script>
const slider15 = document.getElementById('slider15');
const sliderValue15 = document.getElementById('sliderValue15');
const sliderTooltip15 = document.getElementById('sliderTooltip15');

function updateValue15(value) {
    const snappedValue = values[value - 1];
    sliderValue15.innerText = snappedValue;
    slider15.setAttribute('data-snapped-value', snappedValue);
    sliderTooltip15.innerText = snappedValue;
    console.log(`User input 14 : ${snappedValue}`);
}

slider15.addEventListener('input', (event) => {
    const value = parseInt(event.target.value);
    updateValue15(value);
});

updateValue15(slider15.value);
</script>

