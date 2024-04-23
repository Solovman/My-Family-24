import {RenderForm} from "./renderForm.js";
import {Requests} from "../requests";
import {Admin} from "../admin.js";

export class Form
{
	static render(data = null)
	{
		const popupId = "ModalPopup_" + new Date().getTime();

		let modalPopup = BX.PopupWindowManager.create(popupId, null, {
			autoHide: true,
			offsetLeft: 0,
			offsetTop: 0,
			overlay : true,
			draggable: {restrict:true},
			closeByEsc: true,
			closeIcon: { right : "12px", top : "10px"},
			content: `<div style=\"width:400px;height:400px; text-align: center;\"><span style=\"position:absolute;left:50%; top:50%\"><img src=\"/bitrix/templates/eshop_adapt_yellow/img/wait.gif\"/></span></div>`,
			events: {
				onPopupShow: function()
				{
					this.setContent(RenderForm.render(data));

					if (data !== null) {
						BX.bind(BX('edit-button'), 'click', (event) => {

							event.preventDefault();

							const newSubscription = {
								id: Number(data.id),
								level: BX('name').value,
								price: BX('price').value,
								numberTrees: BX('numberTrees').value,
								numberNodes: BX('numberNodes').value,
								customization: BX('customization').value
							};

							Requests.updateSubscription(newSubscription).then(result => {
								new Admin({
									rootNodeId: 'table',
								});

								this.destroy();
							});
						});
					}
				},
				onPopupClose: function ()
				{
					this.destroy();
				}
			}
		});

		modalPopup.show();
	}
}