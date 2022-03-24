@if($name == 'email')
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M2.243 6.85448L11.49 1.31048C11.6454 1.21723 11.8233 1.16797 12.0045 1.16797C12.1857 1.16797 12.3636 1.21723 12.519 1.31048L21.757 6.85548C21.8311 6.89989 21.8925 6.96276 21.9351 7.03794C21.9776 7.11313 22 7.19807 22 7.28448V20.0005C22 20.2657 21.8946 20.52 21.7071 20.7076C21.5196 20.8951 21.2652 21.0005 21 21.0005H3C2.73478 21.0005 2.48043 20.8951 2.29289 20.7076C2.10536 20.52 2 20.2657 2 20.0005V7.28348C1.99998 7.19707 2.02236 7.11213 2.06495 7.03694C2.10753 6.96176 2.16888 6.89889 2.243 6.85448ZM4 8.13348V19.0005H20V8.13248L12.004 3.33248L4 8.13248V8.13348ZM12.06 13.6985L17.356 9.23548L18.644 10.7655L12.074 16.3025L5.364 10.7725L6.636 9.22848L12.06 13.6985V13.6985Z"
            fill="#686D7B" fill-opacity="0.3"/>
    </svg>
@elseif($name == 'user')
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M4 22C4 19.8783 4.84285 17.8434 6.34315 16.3431C7.84344 14.8429 9.87827 14 12 14C14.1217 14 16.1566 14.8429 17.6569 16.3431C19.1571 17.8434 20 19.8783 20 22H18C18 20.4087 17.3679 18.8826 16.2426 17.7574C15.1174 16.6321 13.5913 16 12 16C10.4087 16 8.88258 16.6321 7.75736 17.7574C6.63214 18.8826 6 20.4087 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z"
            fill="#686D7B" fill-opacity="0.3"/>
    </svg>
@elseif($name == 'phone')
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M7 4V20H17V4H7ZM6 2H18C18.2652 2 18.5196 2.10536 18.7071 2.29289C18.8946 2.48043 19 2.73478 19 3V21C19 21.2652 18.8946 21.5196 18.7071 21.7071C18.5196 21.8946 18.2652 22 18 22H6C5.73478 22 5.48043 21.8946 5.29289 21.7071C5.10536 21.5196 5 21.2652 5 21V3C5 2.73478 5.10536 2.48043 5.29289 2.29289C5.48043 2.10536 5.73478 2 6 2ZM12 17C12.2652 17 12.5196 17.1054 12.7071 17.2929C12.8946 17.4804 13 17.7348 13 18C13 18.2652 12.8946 18.5196 12.7071 18.7071C12.5196 18.8946 12.2652 19 12 19C11.7348 19 11.4804 18.8946 11.2929 18.7071C11.1054 18.5196 11 18.2652 11 18C11 17.7348 11.1054 17.4804 11.2929 17.2929C11.4804 17.1054 11.7348 17 12 17V17Z"
            fill="#686D7B" fill-opacity="0.3"/>
    </svg>
@elseif($name == 'date')
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M17 3H21C21.2652 3 21.5196 3.10536 21.7071 3.29289C21.8946 3.48043 22 3.73478 22 4V20C22 20.2652 21.8946 20.5196 21.7071 20.7071C21.5196 20.8946 21.2652 21 21 21H3C2.73478 21 2.48043 20.8946 2.29289 20.7071C2.10536 20.5196 2 20.2652 2 20V4C2 3.73478 2.10536 3.48043 2.29289 3.29289C2.48043 3.10536 2.73478 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4ZM6 11H8V13H6V11ZM11 11H13V13H11V11ZM16 11H18V13H16V11Z"
            fill="#686D7B" fill-opacity="0.3"/>
    </svg>
@elseif($name == 'code')
    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-labelledby="qrIconTitle" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" color="#000000"> <title id="qrIconTitle">QR Code</title> <rect x="10" y="3" width="7" height="7" transform="rotate(90 10 3)"/> <rect width="1" height="1" transform="matrix(-1 0 0 1 7 6)"/> <rect x="10" y="14" width="7" height="7" transform="rotate(90 10 14)"/> <rect x="6" y="17" width="1" height="1"/> <rect x="14" y="20" width="1" height="1"/> <rect x="17" y="17" width="1" height="1"/> <rect x="14" y="14" width="1" height="1"/> <rect x="20" y="17" width="1" height="1"/> <rect x="20" y="14" width="1" height="1"/> <rect x="20" y="20" width="1" height="1"/> <rect x="21" y="3" width="7" height="7" transform="rotate(90 21 3)"/> <rect x="17" y="6" width="1" height="1"/>
    </svg>
@endif