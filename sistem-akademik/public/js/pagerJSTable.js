/**
 * Special Thanks to https://getbutterfly.com/client-side-html-pagination-with-javascript/
 */
/* eslint-env browser */
/* global document */
/**
 *
 *
 * @param tableName
 * @param itemsPerPage
 * @constructor
 */
function Pager(tableName, itemsPerPage) {
    'use strict';

    this.tableName = tableName;
    this.itemsPerPage = itemsPerPage;
    this.currentPage = 1;
    this.pages = 0;
    this.inited = false;

    this.showRecords = function (from, to) {
        let rows = document.getElementById(tableName).rows;

        // i starts from 1 to skip table header row
        for (let i = 1; i < rows.length; i++) {
            if (i < from || i > to) {
                rows[i].style.display = 'none';
            } else {
                rows[i].style.display = '';
            }
        }
    };

    this.showPage = function (pageNumber) {
        if (!this.inited) {
            // Not initialized
            return;
        }

        let oldPageAnchor = document.getElementById('pg' + this.currentPage);
        oldPageAnchor.parentElement.classList.remove('active');

        this.currentPage = pageNumber;
        let newPageAnchor = document.getElementById('pg' + this.currentPage);
        newPageAnchor.parentElement.classList.add('active');

        let from = (pageNumber - 1) * itemsPerPage + 1;
        let to = from + itemsPerPage - 1;
        this.showRecords(from, to);

        let pgNext = document.querySelector('.pg-next'),
            pgPrev = document.querySelector('.pg-prev');

        if(pgNext != null){
            if (this.currentPage == this.pages) {
                pgNext.style.display = 'none';
            } else {
                pgNext.style.display = '';
            }
        }

        if(pgPrev != null) {
            if (this.currentPage === 1) {
                pgPrev.style.display = 'none';
            } else {
                pgPrev.style.display = '';
            }
        }
    };

    this.prev = function () {
        if (this.currentPage > 1) {
            this.showPage(this.currentPage - 1);
        }
    };

    this.next = function () {
        if (this.currentPage < this.pages) {
            this.showPage(this.currentPage + 1);
        }
    };

    this.init = function () {
        let rows = document.getElementById(tableName).rows;
        let records = (rows.length - 1);

        this.pages = Math.ceil(records / itemsPerPage);
        this.inited = true;
    };

    this.showPageNav = function (pagerName, positionId) {
        if (!this.inited) {
            // Not initialized
            return;
        }

        let element = document.getElementById(positionId);
        let pagerHtml = `<nav aria-label="Page navigation ">
                         <ul class="pagination">
                         <li class="page-item">
                            <a onclick="${pagerName}.prev();" class="page-link" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>`;

        for (let page = 1; page <= this.pages; page++) {
            let addStyleActive = "";
            if(page == 1){
                addStyleActive = "active";
            }
            pagerHtml += `
                <li class="page-item ${addStyleActive}">
                    <a id="pg${page}" onclick="${pagerName}.showPage(${page});" class="page-link">
                        ${page}
                    </a>
                </li>
            `;
        }
        pagerHtml += `  <li class="page-item">
                            <a onclick="${pagerName}.next();" class="page-link" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>`;
        //pagerHtml += '<span onclick="' + pagerName + '.next();" class="pg-normal">»</span>';

        element.innerHTML = pagerHtml;
    };
    // this.showPageNav = function (pagerName, positionId) {
    //     if (!this.inited) {
    //         // Not initialized
    //         return;
    //     }
    //
    //     let element = document.getElementById(positionId);
    //     let pagerHtml = '<span onclick="' + pagerName + '.prev();" class="pg-normal pg-prev">«</span>';
    //
    //     for (let page = 1; page <= this.pages; page++) {
    //         pagerHtml += '<span id="pg' + page + '" class="pg-normal pg-next" onclick="' + pagerName + '.showPage(' + page + ');">' + page + '</span>';
    //     }
    //
    //     pagerHtml += '<span onclick="' + pagerName + '.next();" class="pg-normal">»</span>';
    //
    //     element.innerHTML = pagerHtml;
    // };
}
