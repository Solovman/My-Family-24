export class Requests
{
	static getListSubscription() {
		return new Promise((resolve, reject) => {
			BX.ajax.runAction('up:tree.admin.getListSubscription')
				.then((response) => {
					const listSubscription = response.data.listSubscription;

					resolve(listSubscription);
				})
				.catch((error) => {
					reject(error);
				})
			;
		});
	}

	static getListPurchase() {
		return new Promise((resolve, reject) => {
			BX.ajax.runAction('up:tree.admin.getListPurchase')
				.then((response) => {
					const listPurchase = response.data.listPurchase;

					resolve(listPurchase);
				})
				.catch((error) => {
					reject(error);
				})
			;
		});
	}

	static getListUserSubscriptions() {
		return new Promise((resolve, reject) => {
			BX.ajax.runAction('up:tree.admin.getListUserSubscription')
				.then((response) => {
					const listUserSubscriptions = response.data.listUserSubscriptions;

					resolve(listUserSubscriptions);
				})
				.catch((error) => {
					reject(error);
				})
			;
		});
	}

	static getListUserPurchase() {
		return new Promise((resolve, reject) => {
			BX.ajax.runAction('up:tree.admin.getListUserPurchase')
				.then((response) => {
					const listUserPurchase = response.data.listUserPurchase;

					resolve(listUserPurchase);
				})
				.catch((error) => {
					reject(error);
				})
			;
		});
	}

	static deactivationSubscription(id, active) {
		return new Promise((resolve, reject) => {
			BX.ajax.runAction('up:tree.admin.deactivationSubscription', {
				data: {
					id: id,
					active: active
				}
			})
				.then((response) => {
					resolve(response.data);
				})
				.catch((error) => {
					reject(error);
				})
			;
		});
	}

	static updateSubscription(newSubscription) {
		return new Promise((resolve, reject) => {
			BX.ajax.runAction('up:tree.admin.updateSubscription', {
					data: {
						newSubscription: newSubscription
					}
				})
				.then((response) => {
					resolve(response.data);
				})
				.catch((error) => {
					reject(error);
				})
			;
		});
	}

	static addSubscription(subscription) {
		return new Promise((resolve, reject) => {
			BX.ajax.runAction('up:tree.admin.addSubscription', {
					data: {
						subscription: subscription
					}
				})
				.then((response) => {
					resolve(response.data);
				})
				.catch((error) => {
					reject(error);
				})
			;
		});
	}
}