import {Type, Tag} from 'main.core';
import {ModalWindow} from "./modalWindow";
import {Modal} from "./modalWindow/modal.js";

export class TreeList
{
	constructor(options = {})
	{
		if(Type.isStringFilled(options.rootNodeId))
		{
			this.rootNodeId = options.rootNodeId;
		}
		else
		{
			throw new Error('TreeList: options.rootNodeId required');
		}
		this.rootNode = document.getElementById(this.rootNodeId);

		if (!this.rootNode)
		{
			throw new Error(`TreeList: element with id "${this.rootNodeId}" not found`);
		}

		this.treeList = [];

		const addButton = BX('addTreeButton');
		addButton.addEventListener('click', () => {
			this.handleAddTreeButtonClick()});

		const inputTitle = BX('treeTitleInput');
		inputTitle.addEventListener('keypress', (event) => {
			if (event.key === 'Enter') {
				this.handleAddTreeButtonClick();
			}
		});
		this.reload();
	}
	handleAddTreeButtonClick() {

		const inputTitle = BX('treeTitleInput');
		const treeTitle = inputTitle.value.trim();
		const warningMessage = BX('warningMessage');


		if (treeTitle !== '') {

			this.addTree(treeTitle).then((result) => {
				if (result === false)
				{
					ModalWindow.render();
				}

				inputTitle.value = '';
				this.reload();
			}).catch((error) => {
				console.error('Error adding tree:', error);
			});
		} else {
			warningMessage.textContent = 'Please enter a tree title!';
			console.error('Tree title is empty');
		}
	}

	handleRemoveTreeButtonClick(element) {
		const treeId = parseInt(element.id.match(/\d+/));
		if (treeId !== '') {
			const confirmDelete = confirm("Are you sure you want to remove the tree?");
			if (confirmDelete) {
				this.removeTree(treeId)
					.then(() => {
						this.reload();
					})
					.catch((error) => {
						console.error('Error when deleting a tree:', error);
					});
			}
		}
	}

	reload()
	{
		this.loadList()
			.then(treeList => {
				this.treeList = treeList;
				this.render();
			});
	}

	loadList()
	{
		return new Promise((resolve, reject) => {
			BX.ajax.runAction(
					'up:tree.trees.getTrees',
					{
						data: {
							apiKey: 'very_secret_key',
						}
					})
				.then((responce) => {
					const treeList = responce.data.trees;
					resolve(treeList);
				})
				.catch((error) => {
					console.error(error);
				})
			;
		});
	}
	addTree(treeTitle)
	{
		return new Promise((resolve, reject) =>
		{
			BX.ajax.runAction('up:tree.trees.addTree', {
				data: { treeTitle: treeTitle }
			}).then((response) =>
				{
					resolve(response.data);
				})
				.catch((error) =>
				{
					reject(error);
				});
		});
	}
	removeTree(id)
	{
		return new Promise((resolve, reject) =>
		{
			BX.ajax.runAction('up:tree.trees.removeTree', {
				data: {
					id: id
				}
			}).then((response) =>
				{
					resolve(response.data);
				})
				.catch((error) =>
				{
					reject(error);
				});
		});
	}

	render()
	{
		this.rootNode.innerHTML = '';

		const treeContainerNode = Tag.render`<div class="columns cards-container"></div>`;

		this.treeList.forEach(trees => {
			const treeNode = Tag.render`
				<div class="columns is-multiline">
					<div class="column is-two-fifth">
						<div class="card" style="background: ${trees.color}">
								<header class="card-header is-size-4">
								<div style="display: flex; flex-direction:row; align-items: center; width:100%;">
									<a href="/tree/${trees.id}/" class="card-header-title" style="color:white">
											${BX.util.htmlspecialchars(trees.title)}
										</a>
										<input class="tree-card" type="hidden" name="treeId" value="${trees.id}" id="treeId${trees.id}">
										<div style="display: flex; flex-direction:row; align-items: center; justify-content: center">
											<button id="button${trees.id}" type="button" class="card-header-icon delTreeButton" aria-label="delete task" data-tree-id="${trees.id}">
												<span id="span${trees.id}" class="icon disabled">
													<?xml version="1.0" ?>
														<svg enable-background="new 0 0 40 40" version="1.1" viewBox="0 0 40 40" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g>
														<path fill="white" d="M28,40H11.8c-3.3,0-5.9-2.7-5.9-5.9V16c0-0.6,0.4-1,1-1s1,0.4,1,1v18.1c0,2.2,1.8,3.9,3.9,3.9H28c2.2,0,3.9-1.8,3.9-3.9V16   c0-0.6,0.4-1,1-1s1,0.4,1,1v18.1C33.9,37.3,31.2,40,28,40z"/></g>
														<g><path fill="white" d="M33.3,4.9h-7.6C25.2,2.1,22.8,0,19.9,0s-5.3,2.1-5.8,4.9H6.5c-2.3,0-4.1,1.8-4.1,4.1S4.2,13,6.5,13h26.9   c2.3,0,4.1-1.8,4.1-4.1S35.6,4.9,33.3,4.9z M19.9,2c1.8,0,3.3,1.2,3.7,2.9h-7.5C16.6,3.2,18.1,2,19.9,2z M33.3,11H6.5   c-1.1,0-2.1-0.9-2.1-2.1c0-1.1,0.9-2.1,2.1-2.1h26.9c1.1,0,2.1,0.9,2.1,2.1C35.4,10.1,34.5,11,33.3,11z"/></g><g>
														<path fill="white" d="M12.9,35.1c-0.6,0-1-0.4-1-1V17.4c0-0.6,0.4-1,1-1s1,0.4,1,1v16.7C13.9,34.6,13.4,35.1,12.9,35.1z"/></g><g>
														<path fill="white" d="M26.9,35.1c-0.6,0-1-0.4-1-1V17.4c0-0.6,0.4-1,1-1s1,0.4,1,1v16.7C27.9,34.6,27.4,35.1,26.9,35.1z"/>
														</g><g><path fill="white"  d="M19.9,35.1c-0.6,0-1-0.4-1-1V17.4c0-0.6,0.4-1,1-1s1,0.4,1,1v16.7C20.9,34.6,20.4,35.1,19.9,35.1z"/></g></svg>
													</span>
											</button>
											<button data-btn-tree = "${trees.id}" class="card-header-icon action-tree">
												<svg data-btn-tree = "${trees.id}" width="20px" height="20px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="#fff" class="bi bi-three-dots-vertical">
												  <path data-btn-tree = "${trees.id}" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
												</svg>
											</button>
										</div>
									</div>
								</header>
								<footer class="card-footer">
									<span class="card-footer-item is-size-6">
										<div style="font-size: 1.2em; color:white"><strong style="color:white">Created at :</strong> ${BX.date.format('d F Y', trees.createdAt)}</div>
									</span>
								</footer>
							</div>
						</div>
					<?php
					endforeach; ?>
				</div>
			`;
			treeContainerNode.appendChild(treeNode);
		});
		this.rootNode.appendChild(treeContainerNode);


		const removeButtons = document.querySelectorAll('.delTreeButton');
		removeButtons.forEach(button => {
			button.addEventListener('click', (event) => {
				this.handleRemoveTreeButtonClick(event.target);
			});
		});

		const actionTreeBtn = document.querySelectorAll('.action-tree');

		actionTreeBtn.forEach(btn => {
			BX.bind(btn, 'click', (event) => {
				const treeId = event.target.dataset.btnTree;
				const data = this.treeList.find(item => item.id === Number(treeId));
				Modal.render(data)
			})
		})
	}
}
