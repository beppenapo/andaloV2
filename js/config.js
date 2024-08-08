const ajaxType = 'POST'
const dataType = 'json'
const headerJson = {'Content-Type': 'application/json'}
const $root = $('html, body');
const page = window.location.pathname.split('/').pop().split('.')[0]
const foto = 'foto/';
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
const toastElementList = [].slice.call(document.querySelectorAll('.toast'));
const toastList = toastElementList.map(function (toastEl) { return new bootstrap.Toast(toastEl, { delay: 3000 }); });
const logged = localStorage.getItem('logged');

//gallery
const imageContainer = document.getElementById('wrapImg');
const loadingAlert = $('#loadingAlert');
const limit = screen.width < 768 ? 12 : 18
let offset = 0;
let allImagesLoaded = false;
let isLoading = false;
let dati={}

//mappe
const BING_KEY = 'Arsp1cEoX9gu-KKFYZWbJgdPEa8JkRIUkxcPr8HBVSReztJ6b0MOz3FEgmNRd4nM';
const OSM_TILE = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
const OSM_ATTRIB = '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors';
const TF_TILE = 'https://tile.thunderforest.com/neighbourhood/{z}/{x}/{y}.png?apikey=f1151206891e4ca7b1f6eda1e0852b2e';

//loader
const loader = $("#loading"); 
let ajaxCallsCompleted = true;
let pageLoaded = false;
let domContentLoaded = false;