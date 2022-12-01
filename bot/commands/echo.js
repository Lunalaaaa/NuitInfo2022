const { SlashCommandBuilder } = require('discord.js');

module.exports = {
	data: new SlashCommandBuilder()
		.setName('echo')
		.setDescription('Sends a message.'),
	async execute(interaction) {
		await interaction.reply('Pong.');
	},
};