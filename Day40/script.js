const getTreeData = () => {
    return {
        "data": "A",
        "left": {
            "data": "B",
            "left": {
                "data": "D",
                "left": null,
                "right": null
            },
            "right": {
                "data": "E",
                "left": null,
                "right": null
            }
        },
        "right": {
            "data": "C",
            "left": {
                "data": "F",
                "left": null,
                "right": null
            },
            "right": {
                "data": "G",
                "left": {
                    "data": "Z",
                    "left": null,
                    "right": {
                        "data": "Y",
                        "left": null,
                        "right": null
                    }
                },
                "right": null
            }
        }
    };
};

const renderBinaryTree = (node) => {
    const { left, right, data } = node;
    let html = `
      <div class="node__element" id="node_${data}">${data}</div>
    `;
    if (left || right) {
        html += `
        <div class="node__bottom-line"></div>
        <div class="node__children">
      `;
        if (left) {
            html += `
          <div class="node node--left">
            ${renderBinaryTree(left)}
          </div>
        `;
        }
        if (right) {
            html += `
          <div class="node node--right">
            ${renderBinaryTree(right)}
          </div>
        `;
        }
        html += `
        </div>
      `;
    }
    return html;
};


function assignValuesforTree(node) {
    let calculatePoints = (node) => {
        if (!node) {
            return 0;
        }

        let leftPoints = calculatePoints(node.left);
        let rightPoints = calculatePoints(node.right);

        let maxPoints = Math.max(leftPoints,rightPoints);

        let totalPoints = (maxPoints?maxPoints:1000) + 0.1 * maxPoints;

        const nodeElement = document.getElementById(`node_${node.data}`);

        if (nodeElement) {
            if(totalPoints>=1210) nodeElement.textContent += ` (${totalPoints})*`;
            else nodeElement.textContent += ` (${totalPoints})`;
        }
        return totalPoints;
    };

    calculatePoints(node);
}

const main = () => {
    const rootNode = getTreeData();
    const treeDOMElement = document.querySelector('.tree');
    treeDOMElement.innerHTML = renderBinaryTree(rootNode);
    assignValuesforTree(rootNode);
};

main();
