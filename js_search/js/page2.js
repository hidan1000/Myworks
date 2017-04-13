var arr = [];
function gettable() {
	var rows = document.querySelectorAll("#table1 tr");
	for (var i = 1; i < rows.length; i++) {
		var cols = rows[i].children;
		arr[i-1] = [];
		for (var j = 1; j < cols.length; j++) {
			arr[i-1][j-1] = rows[i].querySelectorAll("td")[j].innerHTML;
		}
	};
};
function cleartable() {
	var rows = document.querySelectorAll("table tr");
	for (var i = 1; i < rows.length; i++) {
		document.querySelectorAll("table tbody")[0].children[1].remove();
	};
};
function search() {
	var arows = arr.length;
	for (var i = 0; i < arows; i++) {
		var acols = arr[i].length;
		arr[i][acols] = 0;
		for (var j = 0; j < acols; j++) {
			var curr = arr[i][j];
			var l = curr.length;
			while (l + srch.length > -1) {
				if (curr.lastIndexOf(srch, l) != -1) {
					arr[i][acols]++;
					gothere = curr.lastIndexOf(srch, l);
					curr = curr.substring(0, gothere) + "<span class='lit'>" + srch + "</span>" + curr.substring(gothere + srch.length);
				}
				l--;
			}
			arr[i][j] = curr;
		}
	}
}

function sortresult() {
	var i = 0;
	var iter = 0;
	while (i < arr.length - 1) {
		var j = i + 1;
		while (j < arr.length) {
			if (arr[i][arr[0].length - 1] < arr[j][arr[0].length - 1]) {
				var newarr = arr[j];
				arr.splice(j, 1);
				arr.splice(i, 0, newarr);
				break;
			}
			else {
				j++;
			}		
		}
		i++;
	}
}

function showresult() {
	for (var i = 0; i < arr.length; i++) {
		document.querySelector("table tbody").appendChild(document.createElement("tr"));
		var elem = document.createElement("td");
		elem.innerHTML = i + 1;
		document.querySelectorAll("table tbody tr")[i + 1].appendChild(elem);
		for ( var j = 0; j < arr[0].length - 1; j++) {
			var elem = document.createElement("td");
			elem.innerHTML = arr[i][j];
			document.querySelectorAll("table tbody tr")[i + 1].appendChild(elem);
		}
	}
}

var srch;
document.getElementById("clk").onclick = function() {
	srch = document.getElementById("searchThis").value;
	gettable();
	cleartable();
	search();
	sortresult();
	showresult();
};