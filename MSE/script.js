document.getElementById("language-selector").addEventListener("change", function () {
    var flagIcon = document.getElementById("flag-icon");

    if (this.value === "en") {
        // İngilizce seçildiğinde İngiliz bayrağını ekle
        flagIcon.innerHTML = `
            <svg viewBox="0 -4 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            // <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> 
            // <g clip-path="url(#clip0_503_2952)"> 
            // <rect width="28" height="20" rx="2" fill="white"></rect> <mask id="mask0_503_2952" 
            // style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="28" height="20">
            //  <rect width="28" height="20" rx="2" fill="white"></rect> </mask> <g mask="url(#mask0_503_2952)">
            //  <rect width="28" height="20" fill="#0A17A7"></rect> <path fill-rule="evenodd" clip-rule="evenodd" d="M-1.28244 -1.91644L10.6667 6.14335V-1.33333H17.3334V6.14335L29.2825 -1.91644L30.7737 0.294324L21.3263 6.66667H28V13.3333H21.3263L30.7737 19.7057L29.2825 21.9165L17.3334 13.8567V21.3333H10.6667V13.8567L-1.28244 21.9165L-2.77362 19.7057L6.67377 13.3333H2.95639e-05V6.66667H6.67377L-2.77362 0.294324L-1.28244 -1.91644Z" fill="white"></path> <path d="M18.668 6.33219L31.3333 -2" stroke="#DB1F35" stroke-width="0.666667" stroke-linecap="round"></path> <path d="M20.0128 13.6975L31.3666 21.3503" stroke="#DB1F35" stroke-width="0.666667" stroke-linecap="round"></path> <path d="M8.00555 6.31046L-3.83746 -1.67099" stroke="#DB1F35" stroke-width="0.666667" stroke-linecap="round"></path> <path d="M9.29006 13.6049L-3.83746 22.3105" stroke="#DB1F35" stroke-width="0.666667" stroke-linecap="round"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M0 12H12V20H16V12H28V8H16V0H12V8H0V12Z" fill="#E6273E"></path> </g> 
            // </g> <defs> <clipPath id="clip0_503_2952"> <rect width="28" height="20" rx="2" fill="white"></rect> </clipPath> </defs> </g></svg>
        `;
    } else {
        // Türkçe seçildiğinde Türk bayrağını ekle
        flagIcon.innerHTML = `
            <svg viewBox="0 -4 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_503_4206)">
                    <rect width="28" height="20" rx="2" fill="white"></rect>
                    <g mask="url(#mask0_503_4206)">
                        <rect width="28" height="20" fill="#E92434"></rect>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M19.0208 10.7684L17.796 12.2533L17.8795 10.3302L16.0887 9.62423L17.9434 9.1093L18.0615 7.18799L19.1244 8.79287L20.9881 8.31142L19.7902 9.81822L20.8241 11.442L19.0208 10.7684V10.7684V10.7684V10.7684Z"
                            fill="white"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M17.4028 13.6838C16.3049 15.0934 14.5916 16 12.6665 16C9.3528 16 6.6665 13.3137 6.6665 10C6.6665 6.68629 9.3528 4 12.6665 4C14.5916 4 16.3049 4.90659 17.4028 6.31611C16.5555 5.70019 15.4902 5.33331 14.333 5.33331C11.5716 5.33331 9.33301 7.42265 9.33301 9.99998C9.33301 12.5773 11.5716 14.6666 14.333 14.6666C15.4902 14.6666 16.5556 14.2997 17.4028 13.6838Z"
                            fill="white"></path>
                    </g>
                </g>
            </svg>
        `;
    }
});